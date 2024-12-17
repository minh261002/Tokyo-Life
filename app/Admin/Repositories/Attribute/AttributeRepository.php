<?php

namespace App\Admin\Repositories\Attribute;

use App\Admin\Repositories\BaseRepository;
use App\Models\Attribute;

class AttributeRepository extends BaseRepository implements AttributeRepositoryInterface
{
    public function getModel()
    {
        return Attribute::class;
    }
}