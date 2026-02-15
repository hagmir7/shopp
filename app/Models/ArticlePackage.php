<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ArticlePackage extends Pivot
{
    protected $table = 'article_packages';
}
