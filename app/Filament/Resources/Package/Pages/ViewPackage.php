<?php

namespace App\Filament\Resources\Package\Pages;

use App\Filament\Resources\Package\PackageResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPackage extends ViewRecord
{
    protected static string $resource = PackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
