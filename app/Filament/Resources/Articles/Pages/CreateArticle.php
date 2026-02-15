<?php

namespace App\Filament\Resources\Articles\Pages;

use App\Filament\Resources\Articles\ArticleResource;
use App\Models\Article;
use Filament\Resources\Pages\CreateRecord;

class CreateArticle extends CreateRecord
{
    protected function mutateFormDataBeforeCreate(array $data): array
    {


        $article = Article::latest('id')->first();

        $nextNumber = $article ? $article->id + 1 : 1;
        $data['code'] = 'ART' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

        $data['site_id'] = app('site')->id;
        $data['user_id'] = auth()->id();
        return $data;
    }
    protected static string $resource = ArticleResource::class;
}
