<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =
    [
        'user_id',
        'address_id',
        'city_name',
        'full_name',
        'status',
        'total_amount',
        'phone',
        'email',
        'country_id',
        'zip_code',
        'region',
        'city_id',
        'site_id',
        'address'
    ];



    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
