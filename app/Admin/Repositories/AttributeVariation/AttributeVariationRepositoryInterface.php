<?php

namespace App\Admin\Repositories\AttributeVariation;

use App\Admin\Repositories\BaseRepositoryInterface;

interface AttributeVariationRepositoryInterface extends BaseRepositoryInterface
{
    public function getOrderByFollow(array $arrayId);

    public function findOrFailWithRelations($id, $relations = ['attribute']);

    public function getQueryBuilderByColumns($column, $value);

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');
}