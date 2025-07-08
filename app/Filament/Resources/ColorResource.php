<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ColorResource\Pages;
use App\Filament\Resources\ColorResource\RelationManagers;
use App\Models\Color;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ColorResource extends Resource
{
    protected static ?string $model = Color::class;

    protected static ?string $navigationIcon = 'heroicon-o-swatch';

    public static function getModelLabel(): string
    {
        return __("Color");
    }

    public static function getPluralLabel(): ?string
    {
        return __("Colors");
    }

    // public static function getEloquentQuery(): Builder
    // {
    //     return parent::getEloquentQuery()->where('');
    // }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
            'index' => Pages\ListColors::route('/'),
            // 'create' => Pages\CreateColor::route('/create'),
            // 'edit' => Pages\EditColor::route('/{record}/edit'),
        ];
    }
}
