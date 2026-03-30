<?php

namespace App\Filament\Resources\Sites\Pages;

use App\Filament\Resources\Sites\SiteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSites extends ListRecords
{
    protected static string $resource = SiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label(__("Create"))
                ->icon('heroicon-o-plus-circle'),
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
