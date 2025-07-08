<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UrlResource\Pages;
use App\Filament\Resources\UrlResource\RelationManagers;
use App\Models\Url;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Icetalker\FilamentTableRepeater\Forms\Components\TableRepeater;
use Illuminate\Support\Arr;

class UrlResource extends Resource
{
    protected static ?string $model = Url::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('site_id', app("site")->id)
            ->orderBy('order')
            ->whereNull('parent_id');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__("Name"))
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('parent_id')
                            ->searchable()
                            ->preload()
                            ->relationship('parent', 'name'),
                        Forms\Components\TextInput::make('path')
                            ->label(__("Url"))
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Toggle::make('top_nav')
                            ->required(),
                        Forms\Components\Toggle::make('header')
                            ->required(),
                        Forms\Components\Toggle::make('footer')
                            ->required(),
                        Forms\Components\Toggle::make('mobile_menu')
                            ->required(),
                    ])->columns(3),
            TableRepeater::make('children')

                ->relationship()
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label(__("Name"))
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('path')
                        ->label(__("Url"))
                        ->required()
                        ->maxLength(255),
                ])
                ->mutateRelationshipDataBeforeCreateUsing(function (array $data): array {
                    $data['site_id'] = app('site')->id;
                    return $data;
                })
                ->cloneable()
                ->collapsible()
                ->maxItems(5)
                ->columnSpan('full')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('parent.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('path')
                    ->searchable(),
                Tables\Columns\IconColumn::make('top_nav')
                    ->boolean(),
                Tables\Columns\IconColumn::make('header')
                    ->boolean(),
                Tables\Columns\IconColumn::make('footer')
                    ->boolean(),
                Tables\Columns\IconColumn::make('mobile_menu')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->reorderable('order')
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
            'index' => Pages\ListUrls::route('/'),
            'create' => Pages\CreateUrl::route('/create'),
            'edit' => Pages\EditUrl::route('/{record}/edit'),
        ];
    }
}
