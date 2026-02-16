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
                    ->suffix(" ". app('site')->currency_code . " ")
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

                TextColumn::make('user.name')
                    ->label(__('User'))
                    ->sortable(),

                TextColumn::make('article.name')
                    ->label(__('Article'))
                    ->sortable(),

                TextColumn::make('package.name')
                    ->label(__('Package'))
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
