<?php

namespace App\Enums\Order;

use App\Traits\Enum;



enum OrderStatus: string
{
    use Enum;

    case Pending = 'pending';

    case Verified = 'verified';

    case Processing = 'processing';

    case Completed = 'completed';

    case Cancelled = 'cancelled';

    case Declined = 'declined';

    public function badge(): string
    {
        return match ($this) {
            OrderStatus::Pending => 'bg-yellow text-yellow-fg',
            OrderStatus::Verified => 'bg-blue text-blue-fg',
            OrderStatus::Processing => 'bg-purple text-purple-fg',
            OrderStatus::Completed => 'bg-green text-green-fg',
            OrderStatus::Cancelled => 'bg-red text-red-fg',
            OrderStatus::Declined => 'bg-gray text-gray-fg',
        };
    }
}