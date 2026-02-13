<?php


namespace App\Filament\Resources\Sites\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class SiteForm
{
    public static function configure(Schema $schema): Schema
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
}
