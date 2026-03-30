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
                    ->formatStateUsing(fn($state) => self::resolveEnum($state)->getLabel())
                    ->color(fn($state) => self::resolveEnum($state)->getColor())
                    ->sortable(),

                TextColumn::make('reference')
                    ->label(__('Reference'))
                    ->placeholder('—')
                    ->searchable(),

                TextColumn::make('article_code')
                    ->label(__('Article Code'))
                    ->searchable(),

                TextColumn::make('article.name')
                    ->label(__('Article'))
                    ->sortable(),

                TextColumn::make('quantity')
                    ->label(__('Quantity'))
                    ->badge()
                    ->color(fn($state, $record) => self::resolveEnum($record->type)->getColor())
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

    private static function resolveEnum(mixed $state): MovementTypeEnum
    {
        return $state instanceof MovementTypeEnum
            ? $state
            : MovementTypeEnum::from($state);
    }
}
