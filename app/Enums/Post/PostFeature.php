<?php

namespace App\Enums\Post;

use App\Traits\Enum;



enum PostFeature: int
{
    use Enum;

    case None = 1;
    case Featured = 2;

    public function badge(): string
    {
        return match ($this) {
            PostFeature::Featured => 'bg-green text-green-fg',
            PostFeature::None => 'bg-red text-red-fg',
        };
    }
}
