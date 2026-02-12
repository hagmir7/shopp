<?php

namespace App\Filament\Resources\Products;

use App\Enums\ProductStatusEnum;
use App\Filament\Resources\Products\Pages;
use App\Models\Color;
use App\Models\Product;
use App\Models\UnitType;
use BackedEnum;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Get;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-squares-2x2';

    public static function getLabel(): string
    {
        return __("Product");
    }

    public static function getPluralLabel(): string
    {
        return __("Products");
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([

            Tabs::make('Heading')
                ->tabs([
                    Tab::make('product')
                        ->icon('heroicon-o-squares-2x2')
                        ->label(__("Product"))
                        ->schema([
                            TextInput::make('name')->label(__("Product name"))->required()->maxLength(255),
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
                            Toggle::make('buy_now')->label(__("Buy now"))->inline(false)->default(0),
                            Textarea::make('description')->label(__("Description"))->required()->columnSpanFull(),
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
                                ->label(__("Colors"))
                                ->columnSpan(1)
                                ->searchable()
                                ->createOptionForm(self::ColorForm())
                                ->createOptionModalHeading(__("Create new color"))
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
                                    FileUpload::make('path')->image()->required()->label(false),
                                    Select::make('color_id')
                                        ->relationship("color", "name")
                                        ->placeholder(__("Select color"))
                                        ->searchable()
                                        ->preload()
                                        ->label(false)
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
                                    Select::make('unit_type')
                                        ->options(UnitType::pluck('name', 'id')->toArray())
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
                                    TextInput::make('value')->label(__("Value")),
                                    TextInput::make('price')
                                        ->label(__("Price"))
                                        ->required()
                                        ->numeric()
                                        ->prefix(app('site')?->currency),
                                    TextInput::make('code')->label("Code")
                                ])
                                ->reorderable(true)
                                ->defaultItems(1)
                                ->columns(3),
                        ]),
                ])->columnSpanFull(),

            Section::make('Content')
                ->schema([
                    RichEditor::make('content')->label(__("Content"))->columnSpanFull(),
                ]),

            Section::make('Options')
                ->schema([
                    KeyValue::make('options')->label(__("Product options"))->columnSpanFull(),
                ]),
        ]);
    }

    public static function ColorForm(): array
    {
        return [
            TextInput::make('name')->label(__("Color"))->maxLength(255),
            ColorPicker::make('code')->label(__("Code"))->regex('/^#([a-f0-9]{6}|[a-f0-9]{3})\b$/'),
            FileUpload::make('image')->label(__("Image"))->image(),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label(__("Product"))->searchable(),
                Tables\Columns\TextColumn::make('price')->label(__("Price"))->money(app('site')?->currency)->badge()->sortable(),
                Tables\Columns\SelectColumn::make('status')->label(__("Status"))->options(ProductStatusEnum::toArray()),
                Tables\Columns\TextColumn::make('created_at')->label(__("Created"))->dateTime()->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->label(__("Updated"))->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordActions([EditAction::make()])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
