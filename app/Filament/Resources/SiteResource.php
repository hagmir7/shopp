<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteResource\Pages;
use App\Filament\Resources\SiteResource\RelationManagers;
use App\Filament\Resources\UrlResource\RelationManagers\UrlsRelationManager;
use App\Models\Site;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Tabs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SiteResource extends Resource
{
    protected static ?string $model = Site::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    public static function getModelLabel(): string
    {
        return __("Store");
    }


    public static function getPluralLabel(): ?string
    {
        return __("Stores");
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('store')
                            ->icon('heroicon-o-building-storefront')
                            ->label(__("Store"))
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label(__("Store Name"))
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('domain')
                                    ->prefixIcon('heroicon-o-globe-alt')
                                    ->label(__("Domain name"))
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\Select::make('language_id')
                                    ->prefixIcon('heroicon-o-language')
                                    ->relationship('language', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->label(__("Language"))
                                    ->required(),

                                Forms\Components\TextInput::make('email')
                                    ->prefixIcon('heroicon-o-at-symbol')
                                    ->label(__("Email"))
                                    ->email()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('phone')
                                    ->prefixIcon('heroicon-o-phone')
                                    ->label(__("Phone"))
                                    ->tel()
                                    ->maxLength(255),
                            ])->columns(3),
                        Tabs\Tab::make('seo')
                            ->icon('heroicon-o-magnifying-glass-circle')
                            ->label(__("SEO"))
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label(__("Title"))
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TagsInput::make('tags')
                                    ->label(__("Keywords"))
                                    ->separator(',')
                                    ->color('info')
                                    ->reorderable()
                                    ->nestedRecursiveRules(['min:3','max:100'])
                                    ->splitKeys(['Tab', ',', 'Enter', '،']),

                                Forms\Components\Textarea::make('description')
                                    ->label(__("Description"))
                                    ->columnSpanFull(),
                                Forms\Components\FileUpload::make('image')
                                    ->label(__("Image"))
                                    ->image(),
                            ])->columns(2),
                    Forms\Components\Tabs\Tab::make('settings')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->label(__("Settings"))
                            ->schema([

                                Forms\Components\Select::make('country_id')
                                    ->relationship('country', 'name')
                                    ->label(__("Country"))
                                    ->preload()
                                    ->searchable(),
                                Forms\Components\TextInput::make('currency')
                                    ->label(__("Currency"))
                                    ->required()
                                    ->maxLength(255)
                                    ->default('MAD'),
                                Forms\Components\TextInput::make('currency_code')
                                    ->label(__("Currency Code"))
                                    ->required()
                                    ->maxLength(255)
                                    ->default('MAD'),
                                Forms\Components\FileUpload::make('favicon')
                                    ->label(__("Favicon"))
                                    ->image(),
                                Forms\Components\FileUpload::make('logo')
                                    ->image()
                                    ->label(__("Logo")),

                            ])->columns(3),
                        Forms\Components\Tabs\Tab::make('Options')
                            ->label(__("Options"))
                            ->icon('heroicon-o-ellipsis-horizontal-circle')
                            ->schema([
                                Forms\Components\KeyValue::make('options')
                                    ->label(__("Store options"))
                                    ->columnSpanFull(),
                            ]),
                    ])->columnSpanFull(),




            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->label(__("Logo")),
                Tables\Columns\TextColumn::make('name')
                    ->label(__("Store"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('domain')
                    ->label(__("Domain"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('language.name')
                    ->label(__("Language"))
                    ->sortable(),
                Tables\Columns\TextColumn::make('country.name')
                    ->label(__("Country"))
                    ->sortable(),
                Tables\Columns\TextColumn::make('currency')
                    ->label(__("Currency"))
                    ->badge()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__("Created"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__("Updated"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ReplicateAction::make()
                    ->beforeReplicaSaved(function (array $data): array {
                        do {
                            $domain = Str::random(10) . '.com';
                            $exists = DB::table('sites')
                            ->where('domain', $domain)
                            ->exists();
                        } while ($exists);

                        $data['domain'] = $domain;
                        return $data;
                    })



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
            UrlsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSites::route('/'),
            'create' => Pages\CreateSite::route('/create'),
            'edit' => Pages\EditSite::route('/{record}/edit'),
        ];
    }
}
