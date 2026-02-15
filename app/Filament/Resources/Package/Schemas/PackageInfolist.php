<?php

namespace App\Filament\Resources\Package\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PackageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('code'),
                TextEntry::make('costumer_name'),
                TextEntry::make('product_name'),
                TextEntry::make('phone'),
                TextEntry::make('city'),
                TextEntry::make('price')
                    ->money(),
                TextEntry::make('status')
                    ->numeric(),
                TextEntry::make('address')
                    ->placeholder('-'),
                TextEntry::make('tracking_number')
                    ->placeholder('-'),
                TextEntry::make('delivered_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('shipped_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('shipping_price')
                    ->money()
                    ->placeholder('-'),
                TextEntry::make('note')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('shipping_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('site_id')
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
