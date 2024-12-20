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

        };
    }
}
