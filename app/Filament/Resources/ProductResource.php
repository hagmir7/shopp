<?php

namespace App\Filament\Resources;

use App\Enums\ProductStatusEnum;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';


    public static function getModelLabel(): string
    {
        return __("Product");
    }


    public static function getPluralLabel(): ?string
    {
        return __("Products");
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Tabs::make('Heading')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('product')
                            ->icon('heroicon-o-squares-2x2')
                            ->label('Product')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Select::make('status')
                                    ->required()
                                    ->options(ProductStatusEnum::toArray())
                                    ->native(false)
                                    ->default(1),
                                Forms\Components\TextInput::make('sku')
                                    ->label('SKU')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('price')
                                    ->minValue(0)
                                    ->required()
                                    ->numeric()
                                    ->prefix('$'),
                                Forms\Components\TextInput::make('discount')
                                    ->minValue(0)
                                    ->maxValue(99)
                                    ->prefix('%')
                                    ->label(__('Discount'))
                                    ->numeric(),

                                Forms\Components\TextInput::make('stock')
                                    ->label(__("Stock"))
                                    ->minValue(0)
                                    ->numeric(),
                                Forms\Components\Select::make('site_id')
                                    ->relationship('site', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                                Forms\Components\Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                                Forms\Components\Textarea::make('description')
                                    ->label(__("Description"))
                                    ->required()
                                    ->columnSpanFull(),
                                Forms\Components\RichEditor::make('content')
                                    ->label(__("Content"))
                                    ->columnSpanFull(),
                            Forms\Components\TagsInput::make('tags')
                                ->label(__("Keywords"))
                                ->separator(',')
                                ->color('info')
                                ->reorderable()
                                ->nestedRecursiveRules(['min:3', 'max:100'])
                                ->splitKeys(['Tab', ',', 'Enter', '،'])
                                ->columnSpan(2),

                            Forms\Components\Select::make('colors')
                                ->relationship('colors', 'name')
                                ->multiple()
                                ->label(__("Colors"))
                                ->columnSpan(1)
                                ->searchable()
                                ->preload(),

                            ])->columns(3),
                        Forms\Components\Tabs\Tab::make('Images')
                            ->label(__("Images"))
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Forms\Components\Repeater::make("images")
                                    ->relationship()
                                    ->schema([
                                        Forms\Components\FileUpload::make('path')
                                            ->image()
                                            ->required()
                                            ->label(false),
                                        Forms\Components\Select::make('color_id')
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
                        Forms\Components\Tabs\Tab::make('Variants')
                            ->label(__("Variants"))
                            ->icon('heroicon-o-adjustments-vertical')
                            ->schema([
                                // ...
                            ]),
                    ])->columnSpanFull(),
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\KeyValue::make('options')
                            ->label(__("Product options"))
                            ->columnSpanFull(),
                    ]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),

                Tables\Columns\TextColumn::make('tags')
                    ->searchable(),
                Tables\Columns\TextColumn::make('stock')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('site_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
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
