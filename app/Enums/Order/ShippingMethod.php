<?php

namespace App\Enums\Order;

use App\Traits\Enum;



enum ShippingMethod: int
{
    use Enum;

    case GHTK = 1;
    case VNPost = 2;

    public function badge(): string
    {
        return match ($this) {
            ShippingMethod::GHTK => 'bg-green text-green-fg',
            ShippingMethod::VNPost => 'bg-red text-red-fg',
        };
    }
}