<?php

namespace App\Filament\Resources\Transactions\Pages;

use App\Filament\Resources\Transactions\TransactionResource;
use App\Models\Transaction;
use Filament\Resources\Pages\CreateRecord;

class CreateTransaction extends CreateRecord
{
    protected static string $resource = TransactionResource::class;


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['site_id'] = app('site')->id;
        $data['user_id'] = auth()->id();

        $transaction = Transaction::latest('id')->first();
        $nextNumber = $transaction ? $transaction->id + 1 : 1;
        $data['code'] = 'TR' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
        return $data;
    }
}
