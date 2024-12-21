<?php

namespace App\Enums\Order;

use App\Traits\Enum;



enum PaymentStatus: int
{
    use Enum;

    case Pending = 1;

    case Paid = 2;

    public function badge(): string
    {
        return match ($this) {
            PaymentStatus::Pending => 'bg-red text-red-fg',
            PaymentStatus::Paid => 'bg-green text-green-fg',
        };
    }
}
