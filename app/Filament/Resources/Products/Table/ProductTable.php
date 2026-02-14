<?php

namespace App\Filament\Resources\Products\Table;

use App\Enums\ProductStatusEnum;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables;

class ProductTable
{

    public static function configure(Tables\Table $table): Tables\Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__("Product"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label(__("Price"))
                    ->suffix(app('site')?->currency)
                    ->badge()
                    ->sortable(),
                Tables\Columns\SelectColumn::make('status')
                    ->label(__("Status"))
                    ->options(ProductStatusEnum::toArray()),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__("Created"))
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__("Updated"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordActions([EditAction::make()])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }
}
