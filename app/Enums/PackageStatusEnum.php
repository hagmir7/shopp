<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum PackageStatusEnum: int implements HasLabel, HasColor
{
    case PENDING = 1;
    case CONFIRMED = 2;
    case SHIPPED = 3;
    case DELIVERED = 4;
    case CANCELLED = 5;
    case RETURNED = 6;


    public function getLabel(): ?string
    {
        return match ($this) {
            self::PENDING => __("Pending"),
            self::CONFIRMED => __("Confirmed"),
            self::SHIPPED => __("Shipped"),
            self::DELIVERED => __("Delivered"),
            self::CANCELLED => __("Cancelled"),
            self::RETURNED => __("Returned"),
        };
    }


    public static function toArray(): array
    {
        return [
            self::PENDING->value => __("Pending"),
            self::CONFIRMED->value => __("Confirmed"),
            self::SHIPPED->value => __("Shipped"),
            self::DELIVERED->value => __("Delivered"),
            self::CANCELLED->value => __("Cancelled"),
            self::RETURNED->value => __("Returned"),
        ];
    }


    public function getColor(): string|array|null
    {
        return match ($this) {
            self::PENDING => 'gray',
            self::CONFIRMED => 'info',
            self::SHIPPED => 'primary',
            self::DELIVERED => 'success',
            self::CANCELLED => 'danger',
            self::RETURNED => 'warning',
        };
    }
}
