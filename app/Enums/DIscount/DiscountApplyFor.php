<?php

namespace App\Enums\Discount;

use App\Traits\Enum;



enum DiscountApplyFor: int
{
    use Enum;

    case One = 1;
    case All = 2;

    public function badge(): string
    {
        return match ($this) {

        };
    }
}