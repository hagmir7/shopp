<?php

namespace App\Filament\Resources\Movements\Schemas;

use App\Enums\MovementTypeEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MovementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('type')
                    ->label(__('Type'))
                    ->options(MovementTypeEnum::toArray())
                    ->required(),

                Select::make('article_id')
                    ->relationship('article', 'name')
                    ->label(__('Article'))
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('quantity')
                    ->label(__('Quantity'))
                    ->required()
                    ->numeric(),

            ]);
    }
}
