<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([


                Grid::make(3)
                    ->schema([

                        Section::make()
                            ->schema([
                                TextInput::make('name')
                                    ->label(__('Name'))
                                    ->columnSpanFull()
                                    ->required(),

                                Textarea::make('description')
                                    ->label(__('Description'))
                                    ->required()
                                    ->columnSpanFull(),






                                Select::make('product_id')
                                    ->relationship('product', 'name')
                                    ->label(__('Product')),


                                Select::make('color_id')
                                    ->relationship('color', 'name')
                                    ->label(__('Color')),


                                TextInput::make('supplier_name')
                                    ->label(__('Supplier Name')),

                                TextInput::make('supplier_code')
                                    ->label(__('Supplier Code')),

                                KeyValue::make('attributes')
                                    ->label(__('Attributes'))
                                    ->columnSpan(2),

                            ])->columns(2)->columnSpan(2),



                        Grid::make()
                            ->schema([
                                Section::make()
                                    ->schema([

                                        TextInput::make('price')
                                            ->label(__('Price'))
                                            ->required()
                                            ->numeric()
                                            ->default(0.0)
                                            ->prefix(app('site')->currency),

                                        TextInput::make('cost_price')
                                            ->label(__('Cost Price'))
                                            ->numeric()
                                            ->prefix(app('site')->currency),

                                        Toggle::make('is_featured')
                                            ->label(__('Featured'))
                                            ->required(),
                                        Toggle::make('is_active')
                                            ->label(__('Active'))
                                            ->required(),

                                        TextInput::make('discount_price')
                                            ->label(__('Discount Price'))
                                            ->numeric()
                                            ->columnSpanFull()
                                            ->prefix(app('site')->curency),


                                    ])->columns(2)->columnSpanFull(),

                                Section::make(__("Stock"))

                                    ->schema([

                                        TextInput::make('quantity')
                                            ->label(__('Quantity'))
                                            ->required()
                                            ->numeric()
                                            ->default(0),
                                        TextInput::make('min_quantity')
                                            ->label(__('Minimum Quantity'))
                                            ->required()
                                            ->numeric()
                                            ->default(0),
                                    ])->columnSpanFull()

                            ]),


                    ])->columnSpanFull()
            ]);
    }
}
