<?php

namespace App\Filament\Resources\Package\Pages;

use App\Filament\Resources\Package\PackageResource;
use App\Models\Package;
use Filament\Resources\Pages\CreateRecord;

class CreatePackage extends CreateRecord
{
    protected static string $resource = PackageResource::class;


    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data['site_id'] = auth()->id();

        $package = Package::latest('id')->first();
        $nextNumber = $package ? $package->id + 1 : 1;

        $data['code'] = 'PKG' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

        return $data;
    }
}
