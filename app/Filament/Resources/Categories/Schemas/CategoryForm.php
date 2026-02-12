<?php

namespace App\Filament\Resources\Category\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;


class CategoryForm
{
    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\Grid::make(3)
                ->schema([
                    Forms\Components\Section::make()
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->label(__("Category"))
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('discount')
                                ->label(__("Discount"))
                                ->numeric()
                                ->minValue(0)
                                ->maxValue(99),
                            Forms\Components\Textarea::make('description')
                                ->label(__("Description"))
                                ->columnSpanFull(),
                        ])
                        ->columnSpan(2)
                        ->columns(2),
                    Forms\Components\Section::make()
                        ->schema([

                            Forms\Components\FileUpload::make('image')
                                ->label(__("Image"))
                                ->image(),

                            Forms\Components\Toggle::make('status')
                                ->inline(false)
                                ->default(true)
                                ->label(__("Status")),
                        ])->columnSpan(1)
                ]),
        ]);
    }
}
