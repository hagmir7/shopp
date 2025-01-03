<?php

namespace App\Models;

use App\Enums\ProductStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasSlug;

    protected $fillable = [
        'name', 'description', 'discount',
        'price', 'content', 'options', 'sku',
        'stock', 'site_id', 'slug', 'status',
        'tags', 'category_id', 'unit_id'
    ];

    protected $casts = [
        'options' => 'array',
        'tags' => 'array',
        'status' => ProductStatusEnum::class
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

    public function units(){
        return $this->hasMany(Unit::class);
    }


    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }


    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function dimensions(){
        return $this->hasMany(Dimension::class);
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
