<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LanguageResource\Pages;
use App\Models\Language;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LanguageResource extends Resource
{
    protected static ?string $model = Language::class;

    protected static ?string $navigationIcon = 'heroicon-o-language';


    public static function getModelLabel(): string
    {
        return __("Language");
    }


    public static function getPluralLabel(): ?string
    {
        return __("Languages");
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
            'index' => Pages\ListLanguages::route('/'),
            // 'create' => Pages\CreateLanguage::route('/create'),
            // 'edit' => Pages\EditLanguage::route('/{record}/edit'),
        ];
    }
}
