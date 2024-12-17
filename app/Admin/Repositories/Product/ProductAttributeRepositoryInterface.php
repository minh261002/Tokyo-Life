<?php

namespace App\Admin\Repositories\Product;

use App\Admin\Repositories\BaseRepositoryInterface;


interface ProductAttributeRepositoryInterface extends BaseRepositoryInterface
{

    public function createOrUpdateWithVariation($product_id, array $productAttribute);

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');

}
