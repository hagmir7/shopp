<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteMedia extends Model
{
    protected $fillable = [
        'site_id',
        'media_id',
        'url'
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
