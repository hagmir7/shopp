<?php

namespace App\Filament\Resources\Sites;

use App\Filament\Resources\Sites\Pages;
use App\Filament\Resources\UrlResource\RelationManagers\UrlsRelationManager;
use App\Models\Site;
use BackedEnum;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Schemas\Components\Tabs;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\KeyValue;
use Illuminate\Support\Str;

class SiteResource extends Resource
{
    protected static ?string $model = Site::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-storefront';

    public static function getModelLabel(): string
    {
        return __("Store");
    }

    public static function getPluralLabel(): ?string
    {
        return __("Stores");
    }

    public static function getEloquentQuery(): Builder
    {
        return static::getModel()::query()
            ->where('user_id', auth()->id());
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Tabs::make('Tabs')
                ->tabs([
                    Tabs\Tab::make('store')
                        ->icon('heroicon-o-building-storefront')
                        ->label(__("Store"))
                        ->schema([
                            TextInput::make('name')
                                ->label(__("Store Name"))
                                ->required()
                                ->maxLength(255),

                            TextInput::make('domain')
                                ->prefixIcon('heroicon-o-globe-alt')
                                ->label(__("Domain name"))
                                ->required()
                                ->maxLength(255),

                            Select::make('language_id')
                                ->prefixIcon('heroicon-o-language')
                                ->relationship('language', 'name')
                                ->searchable()
                                ->preload()
                                ->label(__("Language"))
                                ->required(),

                            TextInput::make('email')
                                ->prefixIcon('heroicon-o-at-symbol')
                                ->label(__("Email"))
                                ->email()
                                ->maxLength(255),

                            TextInput::make('phone')
                                ->prefixIcon('heroicon-o-phone')
                                ->label(__("Phone"))
                                ->tel()
                                ->maxLength(255),
                        ])->columns(3),

                    Tabs\Tab::make('seo')
                        ->icon('heroicon-o-magnifying-glass-circle')
                        ->label(__("SEO"))
                        ->schema([
                            TextInput::make('title')
                                ->label(__("Title"))
                                ->required()
                                ->maxLength(255),

                            TagsInput::make('tags')
                                ->label(__("Keywords"))
                                ->separator(',')
                                ->color('info')
                                ->reorderable()
                                ->nestedRecursiveRules(['min:3', 'max:100'])
                                ->splitKeys(['Tab', ',', 'Enter', '،']),

                            Textarea::make('description')
                                ->label(__("Description"))
                                ->columnSpanFull(),

                            FileUpload::make('image')
                                ->label(__("Image"))
                                ->image(),
                        ])->columns(2),

                    Tabs\Tab::make('settings')
                        ->icon('heroicon-o-cog-6-tooth')
                        ->label(__("Settings"))
                        ->schema([
                            Select::make('country_id')
                                ->relationship('country', 'name')
                                ->label(__("Country"))
                                ->preload()
                                ->searchable(),

                            TextInput::make('currency')
                                ->label(__("Currency"))
                                ->required()
                                ->maxLength(255)
                                ->default('MAD'),

                            TextInput::make('currency_code')
                                ->label(__("Currency Code"))
                                ->required()
                                ->maxLength(255)
                                ->default('MAD'),

                            FileUpload::make('favicon')
                                ->label(__("Favicon"))
                                ->image(),

                            FileUpload::make('logo')
                                ->image()
                                ->label(__("Logo")),

                            FileUpload::make('dark_logo')
                                ->label(__("Dark Logo"))
                                ->image(),

                            Textarea::make('header')
                                ->label(__("Header"))
                                ->columnSpanFull(),

                            Textarea::make('footer')
                                ->label(__("Footer"))
                                ->columnSpanFull(),
                        ])->columns(3),

                    Tabs\Tab::make('options')
                        ->label(__("Options"))
                        ->icon('heroicon-o-ellipsis-horizontal-circle')
                        ->schema([
                            KeyValue::make('options')
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
                ImageColumn::make('logo')->label(__("Logo")),
                TextColumn::make('name')->label(__("Store"))->searchable(),
                TextColumn::make('domain')->label(__("Domain"))->searchable(),
                TextColumn::make('language.name')->label(__("Language"))->sortable(),
                TextColumn::make('country.name')->label(__("Country"))->sortable(),
                TextColumn::make('currency')->label(__("Currency"))->badge()->searchable(),
                TextColumn::make('created_at')->label(__("Created"))->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->label(__("Updated"))->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                ReplicateAction::make()
                    ->beforeReplicaSaved(function (array $data): array {
                        do {
                            $domain = Str::random(10) . '.com';
                            $exists = DB::table('sites')->where('domain', $domain)->exists();
                        } while ($exists);

                        $data['domain'] = $domain;
                        return $data;
                    }),
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
            UrlsRelationManager::class,
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
