<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{


    use HasSlug;


    protected $fillable = [
        'name', 'description', 'discount',
        'price', 'content', 'options',
        'site_id', 'slug', 'status',
        'tags', 'category_id'
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


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['name', 'site_id'])
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(50)
            ->doNotGenerateSlugsOnUpdate();
    }
}
