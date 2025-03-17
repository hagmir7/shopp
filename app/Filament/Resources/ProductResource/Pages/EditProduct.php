<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
             Actions\DeleteAction::make()
                ->color('danger')
                ->icon('heroicon-o-trash'),

            Actions\CreateAction::make()
                ->color('success')
                ->url('/admin/products/create')
                ->icon('heroicon-o-plus-circle'),
            Actions\Action::make('view')
                ->label(__("Voir"))
                ->color('info')
                ->url(route('product.show', $this->record->slug))
                ->openUrlInNewTab()
                ->icon('heroicon-o-rocket-launch'),
        ];
    }
}
