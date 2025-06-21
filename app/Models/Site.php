<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Site extends Model
{
    protected $fillable = [
        'name', 'domain', 'title', 'favicon',
        'logo', 'image', 'tags', 'description', 'email',
        'phone', 'currency', 'dark_logo',
        'language_id', 'country_id', 'options',
        'header', 'footer', 'user_id'
    ];

    protected $casts = [
        'tags' => 'array',
        'options' => 'array'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }


    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function urls(): HasMany
    {
        return $this->hasMany(Url::class);
    }

    public function mainUrls(): HasMany
    {
        return $this->hasMany(Url::class)->whereNull('parent_id');
    }

    public function slides()
    {
        return $this->hasMany(Slide::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function media()
    {
        return $this->belongsToMany(Media::class, 'site_media')
            ->withPivot(['url'])
            ->withTimestamps();
    }
}
