<?php

namespace App\Filament\Resources\SlideResource\Pages;

use App\Filament\Resources\SlideResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSlide extends CreateRecord
{
    protected static string $resource = SlideResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['site_id'] = app('site')->id;
        return $data;
    }
}
