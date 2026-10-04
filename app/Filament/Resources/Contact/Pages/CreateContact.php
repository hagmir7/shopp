<?php

namespace App\Filament\Resources\Contact\Pages;

use App\Filament\Resources\Contact\ContactResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContact extends CreateRecord
{
    protected static string $resource = ContactResource::class;
}
