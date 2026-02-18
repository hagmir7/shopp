<?php

namespace App\Filament\Resources\Articles\Tables;

use App\Models\Article;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\Size;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ArticlesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->allowDuplicates()
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('code')
                    ->label(__('Code'))
                    ->searchable(),

                TextColumn::make('name')
                    ->label(__('Name'))
                    ->searchable(),

                TextColumn::make('price')
                    ->label(__('Price'))
                    ->suffix(" " . app('site')->currency . " ")
                    ->sortable(),

                TextColumn::make('quantity')
                    ->label(__('Quantity'))
                    ->badge()
                    ->color(function ($record) {
                        return $record->quantity_min >= $record->quantity
                            ? 'danger'
                            : 'success';
                    })
                    ->sortable(),
                TextColumn::make('cost_price')
                    ->label(__('Cost Price'))
                    ->suffix(" " . app('site')->currency . " ")
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
                ViewAction::make()
                    ->label('')
                    ->tooltip(__("View"))
                    ->size(Size::Large),
                EditAction::make()
                    ->tooltip(__("Delete"))
                    ->label(false)
                    ->size(Size::Large),
            ReplicateAction::make()
                ->tooltip(__('Duplicate'))
                ->size(Size::Large)
                ->label(false)
                ->beforeReplicaSaved(function (array $data, $record): array {
                    // Reset quantity
                    $data['quantity'] = 0;

                    // Use the original model to get the name
                    $data['name'] = $record->name . ' (Copy)';

                    return $data;
                }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
