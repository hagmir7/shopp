<?php

namespace App\Filament\Resources\Country;

use App\Filament\Resources\CountryResource\Pages;
use App\Models\Country;
use BackedEnum;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class CountryResource extends Resource
{
    protected static ?string $model = Country::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-flag';

    public static function getLabel(): string
    {
        return __("Country");
    }

    public static function getPluralLabel(): string
    {
        return __("Countries");
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                    ->label(__("Country"))
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('code')
                    ->label(__("Country code"))
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('currency')
                    ->label(__("Currency"))
                    ->required()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('flag')
                    ->image()
                    ->label(__("Flag"))
                    ->required(),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('flag')
                    ->label(__("Flag")),

                Tables\Columns\TextColumn::make('name')
                    ->label(__("Country"))
                    ->searchable(),

                Tables\Columns\TextColumn::make('code')
                    ->badge()
                    ->label(__("Country code"))
                    ->searchable(),

                Tables\Columns\TextColumn::make('currency')
                    ->badge()
                    ->color('success')
                    ->label(__("Currency"))
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
            'index' => Pages\ListCountries::route('/'),
            // 'create' => Pages\CreateCountry::route('/create'),
            // 'edit' => Pages\EditCountry::route('/{record}/edit'),
        ];
    }
}
