<?php

namespace App\Filament\Resources\Orders;

use App\Filament\Resources\Orders\Pages;
use App\Models\Order;
use BackedEnum;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Schemas\Components\Grid;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-shopping-bag';

    public static function getNavigationGroup(): string|UnitEnum|null
    {
        return __("Store");
    }

    public static function getLabel(): string
    {
        return __("Order");
    }

    public static function getPluralLabel(): string
    {
        return __("Orders");
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::where('status', 1)
            ->where('site_id', app("site")->id)
            ->count();

        return $count > 0 ? (string) $count : null;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('site_id', app('site')->id);
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Order Details')
                ->schema([
                    Select::make('user_id')
                        ->label(__("Customer"))
                        ->preload()
                        ->searchable()
                        ->relationship('user', 'name'),

                // Select::make('address')
                //     ->relationship('address', 'address')
                //     ->label(__("Address"))
                //     ->preload()
                //     ->searchable(),

                    TextInput::make('full_name')
                        ->label(__("Full name"))
                        ->required()
                        ->maxLength(255),

                    TextInput::make('status')
                        ->label(__("Status"))
                        ->numeric()
                        ->required()
                        ->default(1),

                    TextInput::make('total_amount')
                        ->label(__("Total amount"))
                        ->numeric()
                        ->required(),

                    TextInput::make('phone')
                        ->label(__("Phone"))
                        ->tel()
                        ->required()
                        ->maxLength(255),

                    TextInput::make('email')
                        ->label(__("Email"))
                        ->email()
                        ->maxLength(255),

                    Select::make('country_id')
                        ->label(__("Country"))
                        ->relationship('country', 'name'),

                    TextInput::make('zip_code')
                        ->label(__("Zip code"))
                        ->maxLength(255),

                    TextInput::make('region')
                        ->label(__("Region"))
                        ->maxLength(255),

                    Select::make('city_id')
                        ->label(__("City"))
                        ->preload()
                        ->searchable()
                        ->relationship('city', 'name'),

                    Grid::make(2)
                        ->schema([
                            Textarea::make('city_name')
                                ->label(__("City name")),

                            Textarea::make('address')
                                ->label(__("Address")),
                        ]),
                ])->columnSpanFull()
                ->columns(3),

            // Items Repeater Section
            Section::make('Order Items')
                ->schema([
                    Repeater::make('items')
                        ->label(__("Items"))
                        ->relationship('items')
                        ->schema([
                            Grid::make(3)
                                ->schema([
                                    Select::make('product_id')
                                        ->label(__("Product"))
                                        ->preload()
                                        ->searchable()
                                        ->relationship('product', 'name'),

                                    Select::make('dimension_id')
                                        ->label(__("Dimension"))
                                        ->preload()
                                        ->searchable()
                                        ->relationship('dimension', 'value'),

                                    Select::make('color_id')
                                        ->label(__("Color"))
                                        ->preload()
                                        ->searchable()
                                        ->relationship('color', 'name'),

                                    TextInput::make('quantity')
                                        ->label(__("Quantity"))
                                        ->numeric()
                                        ->required(),

                                    TextInput::make('total')
                                        ->label(__("Total"))
                                        ->numeric()
                                        ->required(),
                                ]),
                        ])
                        ->columnSpanFull(),
                ])
                ->columns(1),
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
                    ->label(__("Created"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
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
