<?php

namespace App\Filament\Resources\UnitType\Pages;

use App\Filament\Resources\UnitType\UnitTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUnitTypes extends ListRecords
{
    protected static string $resource = UnitTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
