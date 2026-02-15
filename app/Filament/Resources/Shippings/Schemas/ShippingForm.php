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
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),

                FileUpload::make('image')
                    ->label(__('Image'))
                    ->image(),

                Textarea::make('description')
                    ->label(__('Description'))
                    ->columnSpanFull(),

                TextInput::make('api_key')
                    ->label(__('API Key')),

                TextInput::make('email')
                    ->label(__('Email Address'))
                    ->email(),

                TextInput::make('password')
                    ->label(__('Password'))
                    ->password(),
            ]);
    }
}
