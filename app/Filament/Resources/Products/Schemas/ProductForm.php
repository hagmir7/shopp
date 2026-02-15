<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Enums\ProductStatusEnum;
use App\Filament\Resources\Colors\ColorForm;
use App\Models\Color;
use App\Models\UnitType;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;


class ProductForm
{

    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Tabs::make('Heading')
                ->tabs([
                    Tab::make('product')
                        ->icon('heroicon-o-squares-2x2')
                        ->label(__("Product"))
                        ->schema([
                            TextInput::make('name')
                            ->label(__("Product name"))
                            ->required()
                            ->maxLength(255),
                            Select::make('status')
                                ->required()
                                ->options(ProductStatusEnum::toArray())
                                ->native(false)
                                ->label(__("Status"))
                                ->default(1),
                            TextInput::make('sku')->label('SKU')->maxLength(255),
                            TextInput::make('price')
                                ->label(__("Price"))
                                ->minValue(0)
                                ->required()
                                ->numeric()
                                ->prefix(app('site')?->currency),
                            TextInput::make('discount')
                                ->minValue(0)
                                ->maxValue(99)
                                ->prefix('%')
                                ->label(__('Discount'))
                                ->numeric(),
                            TextInput::make('stock')
                                ->label(__("Stock"))
                                ->minValue(0)
                                ->numeric(),
                            Select::make('category_id')
                                ->relationship('category', 'name', function ($query) {
                                    $query->where('site_id', app('site')->id);
                                })
                                ->searchable()
                                ->label(__("Category"))
                                ->preload(),
                            Toggle::make('buy_now')
                                ->label(__("Buy now"))
                                ->inline(false)
                                ->default(0),
                            Textarea::make('description')
                                ->label(__("Description"))
                                ->required()
                                ->columnSpanFull(),
                            TagsInput::make('tags')
                                ->label(__("Keywords"))
                                ->separator(',')
                                ->color('info')
                                ->reorderable()
                                ->nestedRecursiveRules(['min:3', 'max:100'])
                                ->splitKeys(['Tab', ',', 'Enter', '،'])
                                ->columnSpan(2),
                        Select::make('colors')
                            ->relationship('colors', 'name')
                            ->multiple()
                            ->label(__('Colors'))
                            ->columnSpan(1)
                            ->searchable()
                            ->createOptionForm(function (Schema $schema): Schema {
                                return ColorForm::configure($schema);
                            })
                            ->createOptionModalHeading(__('Create new color'))
                            ->createOptionUsing(function (array $data): int {
                                $color = Color::create($data);
                                return $color->getKey();
                            })
                            ->preload(),

                    ])->columns(3),

                    Tab::make('Images')
                        ->label(__("Images"))
                        ->icon('heroicon-o-photo')
                        ->schema([
                            Repeater::make("images")
                                ->label(__("Images"))
                                ->relationship()
                                ->schema([
                                    FileUpload::make('path')
                                        ->image()->required()->label(__("Image")),
                                    Select::make('color_id')
                                        ->relationship("color", "name")
                                        ->placeholder(__("Select color"))
                                        ->searchable()
                                        ->preload()
                                        ->label(__('Color'))
                                ])
                                ->orderColumn('order')
                                ->reorderable(true)
                                ->defaultItems(4)
                                ->grid(4)
                        ]),

                    Tab::make('Variants')
                        ->label(__("Variants"))
                        ->icon('heroicon-o-adjustments-vertical')
                        ->schema([

                            Repeater::make('dimensions')
                                ->label(__("Variants"))
                                ->relationship()
                                ->schema([
                                    Select::make('unit_type_id')
                                        ->relationship('unitType', 'name')
                                        ->searchable()
                                        ->preload()
                                        ->label(__("Unit type")),

                                    Select::make('unit_id')
                                        ->relationship('unit', 'abbreviation', function ($query, Get $get) {
                                            $query->where('unit_type_id', $get('unit_type'));
                                        })
                                        ->searchable()
                                        ->live()
                                        ->preload()
                                        ->label(__("Unit")),

                                    Select::make('color_id')
                                        ->relationship('color', 'name')
                                        ->searchable()
                                        ->preload()
                                        ->label(__("Color")),
                                    TextInput::make('value')
                                        ->required()
                                        ->label(__("Value")),
                                    TextInput::make('price')
                                        ->label(__("Price"))
                                        ->required()
                                        ->numeric()
                                        ->prefix(app('site')?->currency),
                                    TextInput::make('code')->label("Code")
                                ])
                                ->reorderable(true)
                                ->defaultItems(1)
                                ->columns(6),
                        ]),
                ])->columnSpanFull(),

            Section::make()
                ->schema([
                    RichEditor::make('content')->label(__("Content"))->columnSpanFull(),
                ])->columnSpanFull(),

            Section::make()
                ->schema([
                    KeyValue::make('options')->label(__("Product options"))->columnSpanFull(),
                ])->columnSpanFull(),
        ]);
    }
}
