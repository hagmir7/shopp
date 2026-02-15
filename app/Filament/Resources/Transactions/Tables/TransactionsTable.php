<?php

namespace App\Filament\Resources\Transactions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('amount')
                    ->label(__('Amount'))
                    ->numeric()
                    ->sortable(),

                TextColumn::make('type')
                    ->label(__('Type'))
                    ->numeric()
                    ->sortable(),

                TextColumn::make('status')
                    ->label(__('Status'))
                    ->numeric()
                    ->sortable(),

                TextColumn::make('payment_method')
                    ->label(__('Payment Method'))
                    ->searchable(),

                TextColumn::make('site_id')
                    ->label(__('Site ID'))
                    ->numeric()
                    ->sortable(),

                TextColumn::make('user_id')
                    ->label(__('User ID'))
                    ->numeric()
                    ->sortable(),

                TextColumn::make('article_id')
                    ->label(__('Article ID'))
                    ->numeric()
                    ->sortable(),

                TextColumn::make('package_id')
                    ->label(__('Package ID'))
                    ->numeric()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label(__('Updated At'))
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
