<?php

namespace App\Filament\Resources\UrlResource\Pages;

use App\Filament\Resources\Urls\UrlResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUrl extends CreateRecord
{
    protected static string $resource = UrlResource::class;


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['site_id'] = app('site')->id;
        return $data;
    }
}
