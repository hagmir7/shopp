<?php

namespace App\Filament\Resources\Colors;

use Filament\Schemas\Schema;
use Filament\Forms;

class ColorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                    ->label(__("Color"))
                    ->maxLength(255),

                Forms\Components\ColorPicker::make('code')
                    ->label(__("Code"))
                    ->regex('/^#([a-f0-9]{6}|[a-f0-9]{3})\b$/'),

                Forms\Components\FileUpload::make('image')
                    ->label(__("Image"))
                    ->image(),
            ])->columns(2);
    }
}
