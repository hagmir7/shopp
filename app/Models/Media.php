<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['name', 'icon', 'color'];

    public function sites()
    {
        return $this->belongsToMany(Site::class, 'site_media')
            ->withPivot('url')
            ->withTimestamps();
    }
}
