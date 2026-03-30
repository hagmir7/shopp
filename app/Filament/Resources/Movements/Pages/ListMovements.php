<?php

namespace App\Filament\Resources\Movements\Pages;

use App\Filament\Resources\Movements\MovementResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Icons\Heroicon;

class ListMovements extends ListRecords
{
    protected static string $resource = MovementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->icon(Heroicon::OutlinedPlusCircle),
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
