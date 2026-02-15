<?php

namespace App\Filament\Resources\Articles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ArticlesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->label(__('Code'))
                    ->searchable(),

                TextColumn::make('name')
                    ->label(__('Name'))
                    ->searchable(),

                TextColumn::make('price')
                    ->label(__('Price'))
                    ->suffix(app('site')->currency)
                    ->sortable(),

                TextColumn::make('quantity')
                    ->label(__('Quantity'))
                    ->sortable(),

                TextColumn::make('cost_price')
                    ->label(__('Cost Price'))
                    ->suffix(app('site')->currency)
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label(__('Active'))
                    ->boolean(),

                TextColumn::make('user.name')
                    ->label(__('User'))
                    ->numeric()
                    ->sortable(),

                TextColumn::make('color.name')
                    ->label(__('Color'))
                    ->numeric()
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
