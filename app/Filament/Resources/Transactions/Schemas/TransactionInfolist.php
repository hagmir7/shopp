<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TransactionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('amount')
                    ->numeric(),
                TextEntry::make('type')
                    ->numeric(),
                TextEntry::make('reference')
                    ->columnSpanFull(),
                TextEntry::make('code')
                    ->columnSpanFull(),
                TextEntry::make('status')
                    ->numeric(),
                TextEntry::make('payment_method')
                    ->placeholder('-'),
                TextEntry::make('site_id')
                    ->numeric(),
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('article_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('package_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
