<?php

namespace App\Filament\Resources\Package\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->label(__('Code'))
                    ->required(),

                TextInput::make('costumer_name')
                    ->label(__('Customer Name'))
                    ->required(),

                TextInput::make('product_name')
                    ->label(__('Product Name'))
                    ->required(),

                TextInput::make('phone')
                    ->label(__('Phone'))
                    ->tel()
                    ->required(),

                TextInput::make('city')
                    ->label(__('City'))
                    ->required(),

                TextInput::make('price')
                    ->label(__('Price'))
                    ->required()
                    ->numeric()
                    ->default(0.0)
                    ->prefix('$'),

                TextInput::make('status')
                    ->label(__('Status'))
                    ->required()
                    ->numeric()
                    ->default(0),

                TextInput::make('address')
                    ->label(__('Address')),

                TextInput::make('tracking_number')
                    ->label(__('Tracking Number')),

                DateTimePicker::make('delivered_at')
                    ->label(__('Delivered At')),

                DateTimePicker::make('shipped_at')
                    ->label(__('Shipped At')),

                TextInput::make('shipping_price')
                    ->label(__('Shipping Price'))
                    ->numeric()
                    ->prefix(app('site')->curency),

                Textarea::make('note')
                    ->label(__('Note'))
                    ->columnSpanFull(),

                TextInput::make('shipping_id')
                    ->label(__('Shipping ID'))
                    ->numeric(),

                TextInput::make('site_id')
                    ->label(__('Site ID'))
                    ->numeric(),
            ]);
    }
}
