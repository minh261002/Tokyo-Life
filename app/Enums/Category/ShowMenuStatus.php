<?php

namespace App\Enums\Category;

use App\Traits\Enum;

enum ShowMenuStatus: int
{
    use Enum;

    case Show = 2;

    case Hide = 1;

    public function badge(): string
    {
        return match ($this) {
            ShowMenuStatus::Show => 'bg-green text-green-fg',
            ShowMenuStatus::Hide => 'bg-red text-red-fg',
        };
    }
}
