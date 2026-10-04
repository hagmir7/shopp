<?php

namespace App\Filament\Resources\UnitType\Pages;

use App\Filament\Resources\UnitType\UnitTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUnitType extends EditRecord
{
    protected static string $resource = UnitTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
