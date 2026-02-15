<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ArticleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('code'),
                TextEntry::make('name'),
                TextEntry::make('description')
                    ->columnSpanFull(),
                TextEntry::make('price')
                    ->money(),
                TextEntry::make('cost_price')
                    ->money()
                    ->placeholder('-'),
                TextEntry::make('discount_price')
                    ->money()
                    ->placeholder('-'),
                IconEntry::make('is_active')
                    ->boolean(),
                IconEntry::make('is_featured')
                    ->boolean(),
                TextEntry::make('quantity')
                    ->numeric(),
                TextEntry::make('min_quantity')
                    ->numeric(),
                TextEntry::make('supplier_name')
                    ->placeholder('-'),
                TextEntry::make('supplier_code')
                    ->placeholder('-'),
                TextEntry::make('product_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('site_id')
                    ->numeric(),
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('color_id')
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
