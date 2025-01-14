<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    protected $fillable = ['product_id', 'unit_id', 'value', 'code', 'price', 'stock'];


    public function product(){
        return $this->belongsTo(Product::class);
    }


    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
