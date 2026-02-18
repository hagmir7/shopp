<?php

namespace App\Filament\Resources\UrlResource\Pages;

use App\Filament\Resources\Urls\UrlResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Icons\Heroicon;

class ListUrls extends ListRecords
{
    protected static string $resource = UrlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->icon(Heroicon::OutlinedPlusCircle),
        ];
    }
}
