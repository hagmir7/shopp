<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum TransactionStatusEnum: int implements HasLabel, HasColor
{
    case PENDING   = 1;
    case CONFIRMED = 2;
    case CANCELED  = 3;

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PENDING   => __('Pending'),
            self::CONFIRMED => __('Confirmed'),
            self::CANCELED  => __('Canceled'),
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::PENDING   => 'warning',
            self::CONFIRMED => 'success',
            self::CANCELED  => 'danger',
        };
    }

    public static function toArray(): array
    {
        return [
            self::PENDING->value   => __('Pending'),
            self::CONFIRMED->value => __('Confirmed'),
            self::CANCELED->value  => __('Canceled'),
        ];
    }
}
