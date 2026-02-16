<?php

namespace App\Filament\Resources\Package\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class PackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Grid::make(3)
                    ->schema([
                        TextInput::make('costumer_name')
                            ->label(__('Customer Name'))
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
                            ->prefix(app('site')->currency),

                        TextInput::make('status')
                            ->label(__('Status'))
                            ->required()
                            ->numeric()
                            ->default(0),



                        TextInput::make('shipping_price')
                            ->label(__('Shipping Price'))
                            ->prefix(app('site')->currency)
                            ->minValue(0)
                            ->numeric(),



                        Select::make('shipping_id')
                            ->relationship('shipping', 'name')
                            ->label(__('Shipping'))
                            ->preload()
                            ->searchable(),

                        DateTimePicker::make('delivered_at')
                            ->label(__('Delivered At')),

                        DateTimePicker::make('shipped_at')
                            ->label(__('Shipped At')),



                        TextInput::make('tracking_number')
                            ->columnSpanFull()
                            ->label(__('Tracking Number')),

                        Textarea::make('address')
                            ->columnSpanFull()
                            ->label(__('Address')),

                        Textarea::make('note')
                            ->label(__('Note'))
                            ->columnSpanFull(),


                    ]),


                Repeater::make('articles')
                    ->relationship('articles')
                    ->label(__("Articles"))
                    ->schema([
                        Select::make('article_id')
                            ->label(__('Article'))
                            ->relationship('article', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        TextInput::make('quantity')
                            ->label(__("Quantity"))
                            ->numeric()
                            ->default(1)
                            ->required()
                            ->minValue(1),
                    ])
                    ->columns(2)
                    ->addActionLabel(__('Add Articles'))
                    ->collapsible()
                    ->defaultItems(1)
                    ->cloneable()
            ]);
    }
}
