<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorLog extends Model
{
    protected $fillable = [
        'url',
        'ip_address',
        'user_agent',
        'referrer',
        'visited_at'
    ];

    protected $casts = [
        'visited_at' => 'datetime'
    ];
}
