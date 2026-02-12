<?php

namespace App\Filament\Resources\CountryResource\Pages;

use App\Filament\Resources\Country\CountryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCountries extends ListRecords
{
    protected static string $resource = CountryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label(__("Create"))
                ->icon('heroicon-o-plus-circle'),
        ];
    }
}
