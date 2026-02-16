<?php

namespace App\Filament\Resources\Package\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PackageTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->label(__('Code'))
                    ->searchable(),

                TextColumn::make('costumer_name')
                    ->label(__('Customer Name'))
                    ->searchable(),

                TextColumn::make('phone')
                    ->label(__('Phone'))
                    ->searchable(),

                TextColumn::make('city')
                    ->label(__('City'))
                    ->searchable(),

                TextColumn::make('price')
                    ->label(__('Price'))
                    ->prefix(app("site")->currency_code ." ")
                    ->sortable(),

                TextColumn::make('status')
                    ->label(__('Status'))
                    ->numeric()
                    ->sortable(),

            TextColumn::make('tracking_number')
                ->label(__('Tracking Number'))
                ->searchable(),


                TextColumn::make('shipping.name')
                    ->label(__('Shipping'))
                    ->numeric()
                    ->sortable(),

                TextColumn::make('shipping_price')
                    ->label(__('Shipping Price'))
                    ->suffix(app("site")->currency)
                    ->sortable(),

                TextColumn::make('shipped_at')
                    ->label(__('Shipped At'))
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('delivered_at')
                    ->label(__('Delivered At'))
                    ->dateTime()
                    ->sortable(),



                TextColumn::make('created_at')
                    ->label(__('Created at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label(__('Updated at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
