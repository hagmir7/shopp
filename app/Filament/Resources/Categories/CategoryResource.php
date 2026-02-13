<?php

namespace App\Filament\Resources\Categories;

use App\Filament\Resources\Category\Schemas\CategoryForm;
use App\Filament\Resources\Category\Tables\CategoryTable;
use App\Models\Category;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-user-group';


    public static function getNavigationGroup(): string|UnitEnum|null
    {
        return __("Sell");
    }

    public static function getModelLabel(): string
    {
        return __('Category');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Categories');
    }


    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('site_id', app("site")->id)->latest();
    }


    public static function table(Table $table): Table
    {
        return CategoryTable::configure($table);
    }

    public static function form(Schema $schema): Schema
    {
        return CategoryForm::configure($schema);
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
