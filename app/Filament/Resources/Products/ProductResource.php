<?php

namespace App\Filament\Resources\Products;

use App\Filament\Resources\Products\Schemas\ProductForm;
use App\Filament\Resources\Products\Table\ProductTable;
use App\Filament\Resources\Products\Pages;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use App\Models\Product;
use BackedEnum;
use UnitEnum;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-squares-2x2';


    public static function getNavigationGroup(): string|UnitEnum|null
    {
        return __("Sell");
    }

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
        return ProductForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductTable::configure($table);
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
