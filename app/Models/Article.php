<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    // Fields that can be mass-assigned
    protected $fillable = [
        'code',
        'name',
        'description',
        'price',
        'cost_price',
        'discount_price',
        'is_active',
        'is_featured',
        'quantity',
        'min_quantity',
        'supplier_name',
        'supplier_code',
        'attributes',
        'product_id',
        'site_id',
        'user_id',
        'color_id',
    ];

    // Casts for specific data types
    protected $casts = [
        'price' => 'decimal:2',
        'cost_price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'attributes' => 'array', // JSON column
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationships
     */

    // Article belongs to a Product (optional)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Article belongs to a Site
    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    // Article belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Article may have a Color
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    /**
     * Accessor for attributes JSON column
     * Example: $article->attributes_array
     */
    public function getAttributesArrayAttribute()
    {
        return $this->attributes['attributes'] ?? [];
    }
}
