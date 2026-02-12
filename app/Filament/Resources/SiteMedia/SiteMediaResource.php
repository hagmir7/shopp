<?php

namespace App\Filament\Resources\SiteMedia;

use App\Filament\Resources\SiteMediaResource\Pages;
use App\Models\SiteMedia;
use BackedEnum;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SiteMediaResource extends Resource
{
    protected static ?string $model = SiteMedia::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-paper-clip';

    public static function getLabel(): string
    {
        return __("Social Media");
    }

    public static function getPluralLabel(): string
    {
        return __("Social Media");
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('site_id', app("site")->id)
            ->latest();
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('media_id')
                ->label(__("Platform"))
                ->relationship('media', 'name')
                ->native(false)
                ->required(),

            TextInput::make('url')
                ->label(__("URL"))
                ->url()
                ->suffixIcon('heroicon-m-check-circle')
                ->suffixIconColor('success')
                ->required()
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('media.name')
                    ->label(__("Platform"))
                    ->sortable(),

                Tables\Columns\TextColumn::make('url')
                    ->label(__("URL"))
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__("Created At"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__("Updated At"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListSiteMedia::route('/'),
            // 'create' => Pages\CreateSiteMedia::route('/create'),
            // 'edit' => Pages\EditSiteMedia::route('/{record}/edit'),
        ];
    }
}
