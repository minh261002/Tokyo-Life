<?php

namespace App\Admin\Repositories\Attribute;

use App\Admin\Repositories\BaseRepositoryInterface;

interface AttributeRepositoryInterface extends BaseRepositoryInterface
{
    public function findOrFailWithVariations($id);

    public function getAllPluckById($column = 'name');

    public function findOrFailWithRelations($id, $relations = ['variations']);

    public function getQueryBuilderWithRelations(array $relations = ['variations']);

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');
}
