<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ProductStatusEnum: int implements HasLabel, HasColor
{
    case IN = 1;
    case HIDE = 2;
    case OUT = 3;
    case COMING = 4;
    case ON_REQUEST = 5;



    public function getLabel(): ?string
    {
        return match ($this) {
            self::IN => "In stock",
            self::HIDE => "Hide",
            self::OUT => "Out of stock",
            self::COMING => "Coming soon",
            self::ON_REQUEST => "On request"
        };
    }



    public static function toArray()
    {
        return [
            1 => "In stock",
            2 => "Hide",
            3 => "Out of stock",
            4 => "Coming soon",
            5 => "On request",
        ];
    }


    public function getColor(): string | array | null
    {
        return match ($this) {
            self::IN => 'success',
            self::HIDE => 'danger',
            self::OUT => 'warning',
            self::COMING => 'info',
            self::IN => 'success',
        };
    }
}
