<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'type' => 'integer',
        'quantity' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationships
     */

    // Movement belongs to a Site
    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    // Movement belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Movement belongs to an Article
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    /**
     * Helper Methods
     */

    // Get human-readable type
    public function getTypeTextAttribute(): string
    {
        return match ($this->type) {
            1 => 'Stock In',
            2 => 'Stock Out',
            3 => 'Adjustment',
            default => 'Unknown',
        };
    }


    protected static function booted()
    {
        static::creating(function (Movement $movement) {
            if (!$movement->article_code && $movement->article) {
                $movement->article_code = $movement->article->code;
                $movement->site_id = app('site')->id;
                $movement->user_id = auth()->id();

                $lastMovement = Movement::latest('id')->first();
                $nextNumber = $lastMovement ? $lastMovement->id + 1 : 1;
                $movement->reference = 'MO' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
            }
        });


        static::created(function (Movement $movement) {
            if ($movement->article) {
                switch ($movement->type) {
                    case 1:
                        $movement->article->increment('quantity', $movement->quantity);
                        break;
                    case 2:
                        $movement->article->decrement('quantity', $movement->quantity);
                        break;
                    case 3:
                        $movement->article->increment(['quantity' => $movement->quantity]);
                        break;
                }
            }
        });
    }
}
