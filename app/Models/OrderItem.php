<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{

    protected $fillable = ['order_id', 'product_id', 'dimension_id', 'quantity', 'total', 'color_id'];


    public function product(){
        return $this->belongsTo(Product::class);
    }


    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function dimension(){
        return $this->belongsTo(Dimension::class);
    }

    public function color(){
        return $this->belongsTo(Color::class);
    }
}
