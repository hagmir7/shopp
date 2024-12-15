<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $fillable = [
        'user_id', 'token', 'product_id',
        'collection_id'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function collection(){
        return $this->belongsTo(Collection::class);
    }
}
