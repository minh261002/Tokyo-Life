<?php

namespace App\Enums\Module;

use App\Traits\Enum;

enum ModuleStatus: int
{
    use Enum;

    case Completed = 2;

    case InProgress = 1;

    public function badge(): string
    {
        return match ($this) {
            ModuleStatus::Completed => 'bg-green text-green-fg',
            ModuleStatus::InProgress => 'bg-red text-red-fg',
        };
    }
}
