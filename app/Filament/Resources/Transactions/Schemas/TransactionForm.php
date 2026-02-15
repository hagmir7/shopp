<?php

namespace App\Filament\Resources\Transactions\Schemas;

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

                TextInput::make('type')
                    ->label(__('Type'))
                    ->required()
                    ->numeric(),

                Textarea::make('reference')
                    ->label(__('Reference'))
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('code')
                    ->label(__('Code'))
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('status')
                    ->label(__('Status'))
                    ->required()
                    ->numeric()
                    ->default(0),

                TextInput::make('payment_method')
                    ->label(__('Payment Method')),

                TextInput::make('site_id')
                    ->label(__('Site ID'))
                    ->required()
                    ->numeric(),

                TextInput::make('user_id')
                    ->label(__('User ID'))
                    ->required()
                    ->numeric(),

                TextInput::make('article_id')
                    ->label(__('Article ID'))
                    ->numeric(),

                TextInput::make('package_id')
                    ->label(__('Package ID'))
                    ->numeric(),
            ]);
    }
}
