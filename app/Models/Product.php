<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'content',
        'options',
        'site_id',
        'slug',
        'status',
        'tags',
        'old_price',
        'category_id'
    ];

    protected $casts = [
        'options' => 'array',
        'tags' => 'array'
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_colors');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function measurements()
    {
        return $this->belongsToMany(Measurement::class, 'product_measurements')
            ->withPivot('value');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
