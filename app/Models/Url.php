<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Url extends Model
{
    protected $fillable = [
        'site_id',
        'parent_id',
        'name',
        'top_nav',
        'header',
        'footer',
        'mobile_menu',
        'path',
        'order'
    ];

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Url::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Url::class, 'parent_id')->orderBy('order');
    }
}
