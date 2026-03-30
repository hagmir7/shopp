<?php

namespace App\Models;

use App\Enums\MovementTypeEnum;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Movement extends Model
{
    use HasFactory;

    protected $table = 'movements';

    protected $fillable = [
        'type',
        'reference',
        'quantity',
        'site_id',
        'user_id',
        'article_id',
        'article_code'
    ];

    // Casts
    protected $casts = [
        'type' => MovementTypeEnum::class,
        'quantity' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    /**
     * Relationships
     */

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    /**
     * Helper Methods
     */
    public function getTypeTextAttribute(): string
    {
        return match ($this->type) {
            1 => 'Stock In',
            2 => 'Stock Out',
            3 => 'Adjustment',
            default => 'Unknown',
        };
    }

    /**
     * Model Events
     */
    protected static function booted()
    {
        /**
         * BEFORE CREATE
         */
        static::creating(function (Movement $movement) {

            // Auto-fill fields
            if (!$movement->article_code && $movement->article) {
                $movement->article_code = $movement->article->code;
                $movement->site_id = app('site')->id;
                $movement->user_id = auth()->id();

                $lastMovement = Movement::latest('id')->first();
                $nextNumber = $lastMovement ? $lastMovement->id + 1 : 1;
                $movement->reference = 'MO' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
            }

            // 🚨 Prevent negative stock BEFORE saving
            if ($movement->article && $movement->type == 2) {
                $article = $movement->article()->lockForUpdate()->first();

                if ($article->quantity < $movement->quantity) {
                    Notification::make()
                        ->title('Error')
                        ->body(__('Insufficient quantity in stock.'))
                        ->danger()
                        ->send();

                    return false; // stop creation
                    // throw new \Exception('Insufficient quantity in stock.');
                }
            }
        });

        /**
         * AFTER CREATE
         */
        static::created(function (Movement $movement) {

            DB::transaction(function () use ($movement) {

                $article = $movement->article()->lockForUpdate()->first();

                if (!$article) {
                    return;
                }

                switch ($movement->type) {

                    // Stock IN
                    case 1:
                        $article->increment('quantity', $movement->quantity);
                        break;

                    // Stock OUT
                    case 2:
                        $article->decrement('quantity', $movement->quantity);
                        break;

                    // Adjustment
                    case 3:
                        $article->increment('quantity', $movement->quantity);
                        break;
                }
            });
        });
    }
}
