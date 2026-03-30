<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class TransactionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([

                TextEntry::make('type')
                    ->label(__('Type'))
                    ->badge(),

                TextEntry::make('status')
                    ->label(__('Status'))
                    ->badge(),

                TextEntry::make('payment_method')
                    ->label(__('Payment Method'))
                    ->icon(Heroicon::OutlinedCreditCard)
                    ->placeholder('—'),

                TextEntry::make('amount')
                    ->label(__('Amount'))
                    ->icon(Heroicon::OutlinedCurrencyDollar)
                    ->numeric(),

                TextEntry::make('reference')
                    ->label(__('Reference'))
                    ->icon(Heroicon::OutlinedHashtag)
                    ->placeholder('—')
                    ->copyable()
                    ->columnSpan(2),

                TextEntry::make('code')
                    ->label(__('Code'))
                    ->icon(Heroicon::OutlinedQrCode)
                    ->placeholder('—')
                    ->copyable()
                    ->columnSpan(2),

                TextEntry::make('site.name')
                    ->label(__('Site'))
                    ->icon(Heroicon::OutlinedMapPin)
                    ->placeholder('—'),

                TextEntry::make('user.name')
                    ->label(__('User'))
                    ->icon(Heroicon::OutlinedUser)
                    ->placeholder('—'),

                TextEntry::make('article.name')
                    ->label(__('Article'))
                    ->icon(Heroicon::OutlinedArchiveBox)
                    ->placeholder('—'),

                TextEntry::make('package.name')
                    ->label(__('Package'))
                    ->icon(Heroicon::OutlinedCube)
                    ->placeholder('—'),

                TextEntry::make('created_at')
                    ->label(__('Created At'))
                    ->icon(Heroicon::OutlinedCalendarDays)
                    ->dateTime()
                    ->placeholder('—'),

                TextEntry::make('updated_at')
                    ->label(__('Updated At'))
                    ->icon(Heroicon::OutlinedCalendarDays)
                    ->dateTime()
                    ->placeholder('—'),

            ]);
    }
}
