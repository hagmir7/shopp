<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;

class Country extends Model
{
    protected $fillable = [
        'name',
        'code',
        'flag',
        'currency',
        'slug'
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['name', 'code'])
            ->slugsShouldBeNoLongerThan(50)
            ->doNotGenerateSlugsOnUpdate()
            ->saveSlugsTo('slug');
    }
}
