<?php

namespace App\Admin\Http\Controllers\Product;

use App\Admin\Http\Requests\Product\ProductAttributeGetRequest;
use App\Admin\Repositories\Attribute\AttributeRepositoryInterface;
use App\Admin\Repositories\Product\ProductAttributeRepositoryInterface;
use App\Http\Controllers\Controller;


class ProductAttributeController extends Controller
{
    protected $repositoryAttribute;
    protected $repository;

    public function __construct(
        ProductAttributeRepositoryInterface $repository,
        AttributeRepositoryInterface $repositoryAttribute
    ) {
        $this->repository = $repository;
        $this->repositoryAttribute = $repositoryAttribute;
    }


    public function create(ProductAttributeGetRequest $request)
    {

        $instance = $this->repositoryAttribute->findOrFailWithVariations($request->input('attribute_id'));

        return view('admin.product.components.box_attribute', [
            'attribute' => $instance
        ]);
    }

    public function delete($id)
    {
        $this->repository->delete($id);
        return response()->json([
            'status' => 200,
            'message' => __('notifySuccess')
        ], 200);
    }
}