<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';

    protected $fillable = [
        'code',
        'costumer_name',
        'product_name',
        'phone',
        'city',
        'price',
        'status',
        'address',
        'tracking_number',
        'delivered_at',
        'shipped_at',
        'shipping_price',
        'note',
        'shipping_id',
        'site_id',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'status' => 'integer',
        'shipping_price' => 'decimal:2',
        'delivered_at' => 'datetime',
        'shipped_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationships
     */

    public function shipping()
    {
        return $this->belongsTo(Shipping::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    /**
     * Helpers
     */

    public function isDelivered(): bool
    {
        return $this->delivered_at !== null;
    }

    public function isShipped(): bool
    {
        return $this->shipped_at !== null;
    }

    // Get status as human-readable text
    public function getStatusTextAttribute(): string
    {
        return match ($this->status) {
            0 => 'Pending',
            1 => 'Shipped',
            2 => 'Delivered',
            3 => 'Cancelled',
            default => 'Unknown',
        };
    }
}
