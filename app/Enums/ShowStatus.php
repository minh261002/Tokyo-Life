<?php

namespace App\Enums;

use App\Traits\Enum;

enum ShowStatus: int
{
    use Enum;

    case Show = 2;

    case Hide = 1;

    public function badge(): string
    {
        return match ($this) {
            ShowStatus::Show => 'bg-green text-green-fg',
            ShowStatus::Hide => 'bg-red text-red-fg',
        };
    }
}