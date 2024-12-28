<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CountryResource\Pages;
use App\Models\Country;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CountryResource extends Resource
{
    protected static ?string $model = Country::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag';

    public static function getModelLabel(): string
    {
        return __("Country");
    }

    public static function getPluralLabel(): ?string
    {
        return __("Countries");
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
            ])->columns(3);
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
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
