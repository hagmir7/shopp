<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = [
        'title', 'description',
        'text_button', 'url', 'image',
        'status', 'site_id'
    ];



    public function site(){
        return $this->belongsTo(Site::class);
    }
}
