<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    // Mass assignable fields
    protected $fillable = [
        'amount',
        'type',
        'reference',
        'code',
        'status',
        'payment_method',
        'site_id',
        'user_id',
        'article_id',
        'package_id',
    ];

    // Casts for specific data types
    protected $casts = [
        'amount' => 'decimal:2',
        'type' => 'integer',
        'status' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationships
     */

    // Transaction belongs to a Site
    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    // Transaction belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Transaction may be linked to an Article
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Helper Methods
     */

    // Get human-readable status
    public function getStatusTextAttribute(): string
    {
        return match ($this->status) {
            0 => 'Pending',
            1 => 'Completed',
            2 => 'Failed',
            default => 'Unknown',
        };
    }

    // Get human-readable type (you can define your types here)
    public function getTypeTextAttribute(): string
    {
        return match ($this->type) {
            0 => 'Purchase',
            1 => 'Refund',
            2 => 'Withdrawal',
            3 => 'Deposit',
            default => 'Unknown',
        };
    }

    protected static function booted()
    {
        static::creating(function ($transaction) {

            if (empty($transaction->site_id) && app()->bound('site')) {
                $transaction->site_id = app('site')->id;
            }


            if (empty($transaction->user_id) && auth()->check()) {
                $transaction->user_id = auth()->id();
            }

            if (empty($transaction->code)) {
                $lastTransaction = self::latest('id')->first();
                $nextNumber = $lastTransaction ? $lastTransaction->id + 1 : 1;
                $transaction->code = 'TR' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
            }

            if (is_null($transaction->status)) {
                $transaction->status = 0;
            }

            if (empty($transaction->reference)) {
                $transaction->reference = uniqid('REF-');
            }
        });
    }
}
