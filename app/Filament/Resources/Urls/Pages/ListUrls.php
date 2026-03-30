<?php

namespace App\Filament\Resources\UrlResource\Pages;

use App\Filament\Resources\Urls\UrlResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Icons\Heroicon;

class ListUrls extends ListRecords
{
    protected static string $resource = UrlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->icon(Heroicon::OutlinedPlusCircle),
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
