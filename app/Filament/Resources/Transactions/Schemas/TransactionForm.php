<?php

namespace App\Filament\Resources\Transactions\Schemas;

use App\Enums\TransactionStatusEnum;
use App\Enums\TransactionTypeEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('amount')
                    ->label(__('Amount'))
                    ->required()
                    ->numeric()
                    ->default(0.0),

                Select::make('type')
                    ->options(TransactionTypeEnum::toArray())
                    ->label(__('Type'))
                    ->required(),

                TextInput::make('reference')
                    ->label(__('Reference'))
                    ->required(),


                Select::make('status')
                    ->label(__('Status'))
                    ->required()
                    ->options(TransactionStatusEnum::toArray())
                    ->default(1),

                TextInput::make('payment_method')
                    ->label(__('Payment Method')),


                Select::make('article_id')
                    ->relationship('article', 'name')
                    ->label(__('Article'))
                    ->searchable()
                    ->preload(),

                Select::make('package_id')
                    ->relationship('package', 'code')
                    ->label(__('Package'))
                    ->preload()
                    ->searchable(),
            ]);
    }
}
