<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum MovementTypeEnum: int implements HasLabel, HasColor
{
    case IN = 1;
    case OUT = 2;
    case RETURN = 3;



    public function getLabel(): ?string
    {
        return match ($this) {
            self::IN => __("In"),
            self::OUT => __("Out"),
            self::RETURN => __("Return"),
        };
    }



    public static function toArray()
    {
        return [
            1 => __("In"),
            2 => __("Out"),
            3 => __("Return"),
        ];
    }


    public function getColor(): string | array | null
    {
        return match ($this) {
            self::IN => 'success',
            self::OUT => 'danger',
            self::RETURN => 'warning',
        };
    }
}
