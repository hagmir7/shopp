<?php

namespace App\Filament\Resources\Shippings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ShippingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                FileUpload::make('image')
                    ->label(__('Image'))
                    ->avatar()
                    ->alignCenter()
                    ->columnSpanFull()
                    ->image(),

                TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),

                TextInput::make('email')
                    ->label(__('Email Address'))
                    ->email(),
                Textarea::make('description')
                    ->label(__('Description'))
                    ->columnSpanFull(),

                TextInput::make('api_key')
                    ->password()
                    ->revealable()
                    ->label(__('API Key')),

                TextInput::make('password')
                    ->password()
                    ->label(__('Password'))
                    ->revealable()
                    ->password(),
            ]);
    }
}
