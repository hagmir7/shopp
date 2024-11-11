<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = [
        'name',
        'domain',
        'title',
        'favicon',
        'logo',
        'image',
        'tags',
        'description',
        'email',
        'phone'
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

    public function media()
    {
        return $this->belongsToMany(Media::class, 'site_media')
            ->withPivot('url')
            ->withTimestamps();
    }
}
