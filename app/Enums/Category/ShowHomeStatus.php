<?php

namespace App\Enums\Category;

use App\Traits\Enum;

enum ShowHomeStatus: int
{
    use Enum;

    case Show = 2;

    case Hide = 1;

    public function badge(): string
    {
        return match ($this) {
            ShowHomeStatus::Show => 'bg-green text-green-fg',
            ShowHomeStatus::Hide => 'bg-red text-red-fg',
        };
    }
}
