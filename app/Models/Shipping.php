<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $table = 'shippings';

    protected $fillable = [
        'name',
        'image',
        'description',
        'api_key',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'api_key',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
