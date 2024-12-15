<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = [
        'name',
        'code',
        'image'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_colors');
    }
}
