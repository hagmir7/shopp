<?php

namespace App\Filament\Resources\CityResource\Pages;

use App\Filament\Resources\Cities\CityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCities extends ListRecords
{
    protected static string $resource = CityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label(__("Create"))
                ->icon('heroicon-o-plus-circle'),
        ];
    }
}
