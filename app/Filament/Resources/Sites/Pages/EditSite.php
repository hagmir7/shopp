<?php

namespace App\Filament\Resources\Sites\Pages;

use App\Filament\Resources\Sites\SiteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSite extends EditRecord
{
    protected static string $resource = SiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label(__("Delete"))
                ->icon('heroicon-o-trash'),
            Actions\Action::make('create')
                ->url('/admin/sites/create')
                ->label(__("Create"))
                ->icon('heroicon-o-plus-circle'),
        ];
    }
}
