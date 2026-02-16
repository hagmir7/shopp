<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum TransactionTypeEnum: int implements HasLabel, HasColor
{
    case IN = 1;
    case OUT = 2;

    public function getLabel(): ?string
    {
        return match ($this) {
            self::IN => __("Sell"),
            self::OUT => __("Buy"),
        };
    }


    public static function toArray()
    {
        return [
            1 => __("Sell"),
            2 => __("Buy"),
        ];
    }


    public function getColor(): string | array | null
    {
        return match ($this) {
            self::IN => 'success',
            self::OUT => 'warning',
        };
    }
}
