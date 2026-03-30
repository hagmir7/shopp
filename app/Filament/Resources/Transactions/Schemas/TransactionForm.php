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
                    ->native(false)
                    ->label(__('Type'))
                    ->required(),

                TextInput::make('reference')
                    ->label(__('Reference'))
                    ->required(),


                Select::make('status')
                    ->label(__('Status'))
                    ->native(false)
                    ->required()
                    ->options(TransactionStatusEnum::toArray())
                    ->default(1),

                Select::make('payment_method')
                    ->options([
                        'Espèces' => 'Espèces',
                        'Virement bancaire' => 'Virement bancaire',
                        'Chèque' => 'Chèque',
                        'PayPal' => 'PayPal',
                        'Carte bancaire' => 'Carte bancaire',
                    ])
                    ->label(__('Payment Method')),


                Select::make('article_id')
                    ->label(__('Article'))
                    ->relationship(
                        name: 'article',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn($query) => $query->orderByDesc('created_at')
                    )
                    ->getOptionLabelFromRecordUsing(
                        fn($record) => "{$record->code} - {$record->name}"
                    )
                    ->searchable(['code', 'name'])
                    ->preload()
                    ->required(),

                Select::make('package_id')
                    ->relationship(
                        name: 'package',
                        titleAttribute: 'code',
                        modifyQueryUsing: fn($query) => $query->orderByDesc('created_at')
                    )
                    ->getOptionLabelFromRecordUsing(
                        fn($record) => "{$record->code} - {$record->costumer_name}"
                    )
                    ->label(__('Package'))
                    ->preload()
                    ->searchable(),
            ]);
    }
}
