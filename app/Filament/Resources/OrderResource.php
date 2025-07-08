<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function getModelLabel(): string
    {
        return __("Order");
    }

    public static function getPluralLabel(): ?string
    {
        return __("Orders");
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('site_id', app('site')->id);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::where('status', 1)->where('site_id', app("site")->id)->count();
        return $count > 0 ? (string) $count : null;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->label(__("Customer"))
                            ->preload()
                            ->searchable()
                            ->relationship('user', 'name'),

                        Forms\Components\Select::make('address_id')
                            ->label(__("Address"))
                            ->relationship('address', 'address')
                            ->preload()
                            ->searchable(),
                        Forms\Components\TextInput::make('full_name')
                            ->label(__("Full name"))
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('status')
                            ->label(__("Status"))
                            ->required()
                            ->numeric()
                            ->default(1),
                        Forms\Components\TextInput::make('total_amount')
                            ->label(__("Total amount"))
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('phone')
                            ->label(__("Phone"))
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->label(__("Email"))
                            ->email()
                            ->maxLength(255),
                        Forms\Components\Select::make('country_id')
                            ->relationship('country', 'name')
                            ->label(__("Country")),
                        Forms\Components\TextInput::make('zip_code')
                            ->label(__("Zip code"))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('region')
                            ->label(__("Region"))
                            ->maxLength(255),
                        Forms\Components\Select::make('city_id')
                            ->relationship('city', 'name')
                            ->preload()
                            ->searchable()
                            ->label(__("City")),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Textarea::make('city_name')
                                    ->label(__("City name"))
                                    ->columnSpan(1),
                                Forms\Components\Textarea::make('address')
                                    ->label(__("Address"))
                                    ->columnSpan(1),
                            ]),
                    ])->columns(3),
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\Repeater::make('items')
                            ->relationship('items')
                            ->label(__("Items"))
                            ->schema([
                                Forms\Components\Grid::make(3)  // Add Grid here for 2 columns inside repeater
                                    ->schema([
                                        Forms\Components\Select::make('product_id')
                                            ->label(__("Product"))
                                            ->relationship('product', 'name')
                                            ->preload()
                                            ->searchable(),
                                        Forms\Components\Select::make('dimension_id')
                                            ->label(__("Dimension"))
                                            ->relationship('dimension', 'value')
                                            ->preload()
                                            ->searchable(),
                                        Forms\Components\Select::make('color_id')
                                            ->label(__("Color"))
                                            ->relationship('color', 'name')
                                            ->preload()
                                            ->searchable(),
                                        Forms\Components\TextInput::make('quantity')
                                            ->label(__("Quantity"))
                                            ->numeric()
                                            ->required(),
                                        Forms\Components\TextInput::make('total')
                                            ->label(__("Total"))
                                            ->numeric()
                                            ->required(),
                                    ])
                            ])
                            ->columnSpanFull()
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->label(__("Full name"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label(__("Phone"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label(__("Status"))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_amount')
                    ->label(__("Total amount"))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
