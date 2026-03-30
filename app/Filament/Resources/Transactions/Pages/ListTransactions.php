<?php

namespace App\Filament\Resources\Transactions\Pages;

use App\Filament\Resources\Transactions\TransactionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Icons\Heroicon;

class ListTransactions extends ListRecords
{
    protected static string $resource = TransactionResource::class;

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
