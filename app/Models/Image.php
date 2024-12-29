<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'product_id',
        'color_id',
        'path',
        'alt',
        'order'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}
