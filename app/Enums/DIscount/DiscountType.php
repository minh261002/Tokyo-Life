<?php

namespace App\Enums\Discount;

use App\Traits\Enum;



enum DiscountType: int
{
    use Enum;

    case Percentage = 1;
    case Fixed = 2;

    public function badge(): string
    {
        return match ($this) {

        };
    }
}
