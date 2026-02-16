<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ArticlePackage extends Pivot
{
    protected $table = 'article_package';

    protected $fillable = [
        'article_id',
        'package_id',
        'product_id',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
