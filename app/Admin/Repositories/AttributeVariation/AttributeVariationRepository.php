<?php

namespace App\Admin\Repositories\AttributeVariation;

use App\Admin\Repositories\BaseRepository;
use App\Models\AttributeVariation;

class AttributeVariationRepository extends BaseRepository implements AttributeVariationRepositoryInterface
{
    public function getModel()
    {
        return AttributeVariation::class;
    }
}