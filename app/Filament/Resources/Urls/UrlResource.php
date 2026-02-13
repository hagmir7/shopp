<?php

namespace App\Filament\Resources\Urls;

use App\Filament\Resources\UrlResource\Pages;
use App\Models\Url;
use BackedEnum;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Schemas\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

// use Icetalker\FilamentTableRepeater\Forms\Components\TableRepeater;

class UrlResource extends Resource
{
    protected static ?string $model = Url::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-link';

    public static function getLabel(): string
    {
        return __("URL");
    }

    public static function getNavigationGroup(): string|UnitEnum|null
    {
        return __("More options");
    }

    public static function getPluralLabel(): ?string
    {
        return __("URLs");
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('site_id', app("site")->id)
            ->whereNull('parent_id')
            ->orderBy('order');
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make()
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
                        ->label(__("URL"))
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Toggle::make('top_nav')->required(),
                    Forms\Components\Toggle::make('header')->required(),
                    Forms\Components\Toggle::make('footer')->required(),
                    Forms\Components\Toggle::make('mobile_menu')->required(),
                ])
                ->columnSpanFull()
                ->columns(3),

            // TableRepeater::make('children')
            //     ->relationship()
            //     ->schema([
            //         Forms\Components\TextInput::make('name')
            //             ->label(__("Name"))
            //             ->required()
            //             ->maxLength(255),
            //         Forms\Components\TextInput::make('path')
            //             ->label(__("URL"))
            //             ->required()
            //             ->maxLength(255),
            //     ])
            //     ->mutateRelationshipDataBeforeCreateUsing(function (array $data): array {
            //         $data['site_id'] = app('site')->id;
            //         return $data;
            //     })
            //     ->cloneable()
            //     ->collapsible()
            //     ->maxItems(5)
            //     ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('parent.name')
                    ->placeholder('__')
                    ->label(__("Parent URL")),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label(__("URL Name")),
                Tables\Columns\TextColumn::make('path')
                    ->searchable()
                    ->label(__("URL Path")),
                Tables\Columns\IconColumn::make('top_nav')->boolean(),
                Tables\Columns\IconColumn::make('header')->boolean(),
                Tables\Columns\IconColumn::make('footer')->boolean(),
                Tables\Columns\IconColumn::make('mobile_menu')->boolean(),
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
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
