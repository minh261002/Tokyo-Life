<?php

namespace App\Enums;

use App\Traits\Enum;



enum ActiveStatus: int
{
    use Enum;

    case Inactive = 1;
    case Active = 2;
    case Deleted = 3;

    public function badge(): string
    {
        return match ($this) {

        };
    }
}
