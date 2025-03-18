<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteMediaResource\Pages;
use App\Filament\Resources\SiteMediaResource\RelationManagers;
use App\Models\SiteMedia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiteMediaResource extends Resource
{
    protected static ?string $model = SiteMedia::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';

    public static function getModelLabel(): string
    {
        return __("Social Media");
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('site_id', app("site")->id)->latest();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('media_id')
                    ->label(__("Media"))
                    ->relationship('media', 'name')
                    ->native(false)
                    ->required(),
                Forms\Components\TextInput::make('url')
                    ->label(__("Media URL"))
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
                    ->label(__("Media"))
                    ->sortable(),
                Tables\Columns\TextColumn::make('url')
                    ->label(__("Media URL"))
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
            'index' => Pages\ListSiteMedia::route('/'),
            // 'create' => Pages\CreateSiteMedia::route('/create'),
            // 'edit' => Pages\EditSiteMedia::route('/{record}/edit'),
        ];
    }
}
