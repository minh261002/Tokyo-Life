<?php

namespace App\Admin\Http\Controllers\Product;

use App\Admin\DataTables\Product\ProductDataTable;
use App\Admin\Http\Requests\Product\ProductStoreRequest;
use App\Admin\Http\Requests\Product\ProductUpdateRequest;
use App\Admin\Http\Resources\ProductResource;
use App\Admin\Repositories\Attribute\AttributeRepositoryInterface;
use App\Admin\Repositories\AttributeVariation\AttributeVariationRepositoryInterface;
use App\Admin\Repositories\Category\CategoryRepositoryInterface;
use App\Admin\Repositories\Product\ProductRepositoryInterface;
use App\Admin\Services\Product\ProductServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;
    protected $productService;
    protected $categoryRepository;
    protected $attributeRepository;
    protected $attributeVariationRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        ProductServiceInterface $productService,
        CategoryRepositoryInterface $categoryRepository,
        AttributeRepositoryInterface $attributeRepository,
        AttributeVariationRepositoryInterface $attributeVariationRepository

    ) {
        $this->productRepository = $productRepository;
        $this->productService = $productService;
        $this->categoryRepository = $categoryRepository;
        $this->attributeRepository = $attributeRepository;
        $this->attributeVariationRepository = $attributeVariationRepository;
    }

    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.index');
    }

    public function create(): View
    {
        $categories = $this->categoryRepository->getFlatTree();
        $attributes = $this->attributeRepository->getAllPluckById();
        return view('admin.product.create', compact('categories', 'attributes', ));
    }

    public function store(ProductStoreRequest $request)
    {
        $this->productService->store($request);
        return redirect()->route('admin.product.index');
    }

    public function edit($id, Request $request): View
    {
        $product = $this->productRepository->loadRelations($this->productRepository->findOrFail($id), [
            'categories:id',
            'productAttributes' => function ($query) {
                return $query->with(['attribute.variations', 'attributeVariations:id']);
            },
            'productVariations.attributeVariations'
        ]);

        $product = new ProductResource($product);
        $categories = $this->categoryRepository->getFlatTree();
        $attributes = $this->attributeRepository->getAllPluckById();

        $product = (object) $product->toArray($request);

        return view(
            'admin.product.edit',
            [
                'product' => $product,
                'categories' => $categories,
                'attributes' => $attributes,
            ]
        );
    }

    public function update(ProductUpdateRequest $request)
    {
        $this->productService->update($request);
        return redirect()->back()->with('success', 'Cập nhật sản phẩm thành công');
    }

    public function updateStatus(Request $request)
    {
        $this->productService->updateStatus($request);

        return response()->json(['status' => 'success']);
    }

    public function getAttribute(Request $request)
    {
        $response = $this->attributeRepository->findOrFailWithVariations($request->attribute_id);
        return view('admin.product.components.box_attribute', compact('response'));
    }

    public function checkAttribute(Request $request)
    {
        return view('admin.product.components.box_variation');
    }

    public function createVariation(Request $request)
    {
        $instance = $this->productService->createProductVariations(
            $request
        );

        return $instance;
    }

    public function delete($id)
    {
        $this->productService->delete($id);
        return response()->json(['status' => 'success', 'message' => 'Xóa sản phẩm thành công']);
    }
}