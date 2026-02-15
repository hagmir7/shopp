<?php

namespace App\Filament\Resources\Movements\Tables;

use App\Enums\MovementTypeEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MovementsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
            TextColumn::make('type')
                ->label(__('Type'))
                ->badge()
                ->formatStateUsing(fn($record) => MovementTypeEnum::from($record->type)->getLabel())
                ->color(fn($record): string => match ($record->type) {
                    1 => 'success',
                    2 => 'danger',
                    3 => 'warning',
                    default => 'gray',
                })
                ->sortable(),

                TextColumn::make('reference')
                    ->label(__('Reference'))
                    ->searchable(),

                TextColumn::make('article_code')
                    ->label(__('Article Code'))
                    ->searchable(),

                TextColumn::make('quantity')
                    ->label(__('Quantity'))
                    ->badge()
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label(__('User'))
                    ->sortable(),

                TextColumn::make('article.name')
                    ->label(__('Article'))
                    ->numeric()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label(__('Created at'))
                    ->dateTime()
                    ->sortable(),

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
