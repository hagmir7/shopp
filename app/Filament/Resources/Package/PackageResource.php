<?php

namespace App\Filament\Resources\Package;

use App\Filament\Resources\Package\Pages\CreatePackage;
use App\Filament\Resources\Package\Pages\EditPackage;
use App\Filament\Resources\Package\Pages\ListPackage;
use App\Filament\Resources\Package\Pages\ViewPackage;
use App\Filament\Resources\Package\Schemas\PackageForm;
use App\Filament\Resources\Package\Schemas\PackageInfolist;
use App\Filament\Resources\Package\Tables\PackageTable;
use App\Models\Package;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PackageResource extends Resource
{
    protected static ?string $model = Package::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArchiveBox;

    protected static ?string $recordTitleAttribute = 'code';

    public static function getModelLabel(): string
    {
        return __("Package");
    }

    public static function getPluralLabel(): ?string
    {
        return __("Packages");
    }


    public static function getNavigationGroup(): string|UnitEnum|null
    {
        return __("Stock management");
    }


    public static function form(Schema $schema): Schema
    {
        return PackageForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PackageInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PackageTable::configure($table);
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
            'index' => ListPackage::route('/'),
            'create' => CreatePackage::route('/create'),
            'view' => ViewPackage::route('/{record}'),
            'edit' => EditPackage::route('/{record}/edit'),
        ];
    }
}
