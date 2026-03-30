<?php

namespace App\Filament\Resources\SiteMediaResource\Pages;

use App\Filament\Resources\SiteMedia\SiteMediaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSiteMedia extends ListRecords
{
    protected static string $resource = SiteMediaResource::class;

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
