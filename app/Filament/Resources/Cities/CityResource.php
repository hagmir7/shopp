<?php

namespace App\Filament\Resources\Cities;

use App\Filament\Resources\CityResource\Pages;
use App\Models\City;
use BackedEnum;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use UnitEnum;

class CityResource extends Resource
{
    protected static ?string $model = City::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-building-office-2';

    public static function getLabel(): string
    {
        return __("City");
    }

    public static function getNavigationGroup(): string|UnitEnum|null
    {
        return __("More options");
    }

    public static function getPluralLabel(): string
    {
        return __("Cities");
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                    ->label(__("City"))
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('country_id')
                    ->label(__("Country"))
                    ->relationship('country', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__("City"))
                    ->searchable(),

                Tables\Columns\TextColumn::make('country.name')
                    ->label(__("Country"))
                    ->searchable(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCities::route('/'),
            // 'create' => Pages\CreateCity::route('/create'),
            // 'edit' => Pages\EditCity::route('/{record}/edit'),
        ];
    }
}
