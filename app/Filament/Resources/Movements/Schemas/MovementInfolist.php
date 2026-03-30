<?php

namespace App\Filament\Resources\Movements\Schemas;

use App\Enums\MovementTypeEnum;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class MovementInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextEntry::make('type')
                    ->label(__('Movement Type'))
                    ->badge()
                    ->formatStateUsing(fn($state) => self::resolveEnum($state)->getLabel())
                    ->color(fn($state) => self::resolveEnum($state)->getColor()),

                TextEntry::make('reference')
                    ->label(__('Reference'))
                    ->icon(Heroicon::OutlinedHashtag)
                    ->placeholder('—')
                    ->copyable(),

                TextEntry::make('article_code')
                    ->label(__('Article Code'))
                    ->icon(Heroicon::OutlinedTag)
                    ->copyable(),

                TextEntry::make('article.name')
                    ->label(__('Article'))
                    ->icon(Heroicon::OutlinedArchiveBox)
                    ->placeholder('—'),

                TextEntry::make('quantity')
                    ->label(__('Quantity'))
                    ->icon(Heroicon::OutlinedCubeTransparent)
                    ->numeric(),


                TextEntry::make('user.name')
                    ->label(__("Created by"))
                    ->icon(Heroicon::OutlinedUser)
                    ->placeholder('—'),

                TextEntry::make('created_at')
                    ->label(__("Created at"))
                    ->icon(Heroicon::OutlinedUser)
                    ->placeholder('—'),




            ]);
    }

    private static function resolveEnum(mixed $state): MovementTypeEnum
    {
        return $state instanceof MovementTypeEnum
            ? $state
            : MovementTypeEnum::from($state);
    }
}
