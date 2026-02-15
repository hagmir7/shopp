<?php

namespace App\Filament\Resources\Movements\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MovementInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('type')
                    ->numeric(),
                TextEntry::make('reference')
                    ->placeholder('-'),
                TextEntry::make('article_code'),
                TextEntry::make('quantity')
                    ->numeric(),
                TextEntry::make('site_id')
                    ->numeric(),
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('article_id')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
