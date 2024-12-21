<?php

namespace App\Enums\Order;

use App\Traits\Enum;



enum PaymentMethod: int
{
    use Enum;

    case Cash = 1;

    case QrCode = 2;

    public function badge(): string
    {
        return match ($this) {
            PaymentMethod::Cash => 'bg-green text-green-fg',
            PaymentMethod::QrCode => 'bg-red text-red-fg',
        };
    }
}
