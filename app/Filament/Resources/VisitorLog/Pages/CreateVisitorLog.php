<?php

namespace App\Filament\Resources\VisitorLogResource\Pages;

use App\Filament\Resources\VisitorLog\VisitorLogResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVisitorLog extends CreateRecord
{
    protected static string $resource = VisitorLogResource::class;
}
