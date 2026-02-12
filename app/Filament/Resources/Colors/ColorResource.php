<?php

namespace App\Filament\Resources\Colors;

use App\Filament\Resources\ColorResource\Pages;
use App\Models\Color;
use BackedEnum;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class ColorResource extends Resource
{
    protected static ?string $model = Color::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-swatch';

    public static function getLabel(): string
    {
        return __("Color");
    }

    public static function getPluralLabel(): string
    {
        return __("Colors");
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                    ->label(__("Color"))
                    ->maxLength(255),

                Forms\Components\ColorPicker::make('code')
                    ->label(__("Code"))
                    ->regex('/^#([a-f0-9]{6}|[a-f0-9]{3})\b$/'),

                Forms\Components\FileUpload::make('image')
                    ->label(__("Image"))
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label(__("Image"))
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->label(__("Color"))
                    ->searchable(),

                Tables\Columns\ColorColumn::make('code')
                    ->label(__("Code")),
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
            'index' => Pages\ListColors::route('/'),
            // 'create' => Pages\CreateColor::route('/create'),
            // 'edit' => Pages\EditColor::route('/{record}/edit'),
        ];
    }
}
