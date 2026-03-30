<?php

namespace App\Filament\Resources\VisitorLogResource\Pages;

use App\Filament\Resources\VisitorLog\VisitorLogResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVisitorLogs extends ListRecords
{
    protected static string $resource = VisitorLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTitle(): string|\Illuminate\Contracts\Support\Htmlable
    {
        $title = static::getResource()::getPluralModelLabel();

        return new \Illuminate\Support\HtmlString(
            '<span style="font-size: 1.25rem; font-weight: 700;">' . str($title)->headline() . '</span>'
        );
    }
}
