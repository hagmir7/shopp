<?php

namespace App\Filament\Resources\SiteMediaResource\Pages;

use App\Filament\Resources\SiteMediaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSiteMedia extends CreateRecord
{
    protected static string $resource = SiteMediaResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['site_id'] = app('site')->id;
        return $data;
    }
}
