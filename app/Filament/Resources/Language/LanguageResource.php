<?php

namespace App\Filament\Resources\Language;

use App\Filament\Resources\LanguageResource\Pages;
use App\Models\Language;
use BackedEnum;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class LanguageResource extends Resource
{
    protected static ?string $model = Language::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-language';

    public static function getLabel(): string
    {
        return __("Language");
    }

    public static function getPluralLabel(): string
    {
        return __("Languages");
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                    ->label(__("Language"))
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('code')
                    ->label(__("Code"))
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__("Language"))
                    ->searchable(),

                Tables\Columns\TextColumn::make('code')
                    ->label(__("Code"))
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
            'index' => Pages\ListLanguages::route('/'),
            // 'create' => Pages\CreateLanguage::route('/create'),
            // 'edit' => Pages\EditLanguage::route('/{record}/edit'),
        ];
    }
}
