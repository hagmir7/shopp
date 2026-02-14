<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;


class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Grid::make(3)
                ->schema([
                    Section::make()
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
                    Section::make()
                        ->schema([

                            FileUpload::make('image')
                                ->label(__("Image"))
                                ->image(),

                            Toggle::make('status')
                                ->inline(false)
                                ->default(true)
                                ->label(__("Status")),
                        ])->columnSpan(1)
                ])->columnSpanFull(),
        ]);
    }
}
