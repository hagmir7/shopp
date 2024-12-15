<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'full_name',
        'rating',
        'content',
        'product_id',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
