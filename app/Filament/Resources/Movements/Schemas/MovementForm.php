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
                    ->label(__('Article'))
                    ->relationship(
                        name: 'article',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn($query) => $query->orderByDesc('created_at')
                    )
                    ->getOptionLabelFromRecordUsing(
                        fn($record) => "{$record->code} - {$record->name}"
                    )
                    ->searchable(['code', 'name'])
                    ->preload()
                    ->required(),

                TextInput::make('quantity')
                    ->label(__('Quantity'))
                    ->required()
                    ->numeric(),

            ]);
    }
}
