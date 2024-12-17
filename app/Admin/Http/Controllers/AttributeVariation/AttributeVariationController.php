<?php

namespace App\Admin\Http\Controllers\AttributeVariation;

use App\Admin\DataTables\AttributeVariation\AttributeVariationDataTable;
use App\Admin\Http\Requests\AttributeVariation\AttributeVariationRequest;
use App\Admin\Repositories\Attribute\AttributeRepositoryInterface;
use App\Admin\Repositories\AttributeVariation\AttributeVariationRepositoryInterface;
use App\Admin\Services\AttributeVariation\AttributeVariationServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttributeVariationController extends Controller
{
    protected $repository;
    protected $attributeRepository;
    protected $service;

    public function __construct(
        AttributeVariationRepositoryInterface $repository,
        AttributeRepositoryInterface $attributeRepository,
        AttributeVariationServiceInterface $service
    ) {
        $this->repository = $repository;
        $this->attributeRepository = $attributeRepository;
        $this->service = $service;
    }

    public function index(AttributeVariationDataTable $dataTable)
    {
        return $dataTable->render('admin.attribute.variation.index');
    }

    public function create($attributeId)
    {
        $attribute = $this->attributeRepository->findOrFail($attributeId);
        return view('admin.attribute.variation.create', compact('attribute'));
    }

    public function store(AttributeVariationRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('admin.attribute.variations', $request->attribute_id)->with('success', 'Thêm mới giá trị thuộc tính thành công');
    }

    public function edit($id)
    {
        $attributeVariation = $this->repository->findOrFail($id);
        return view('admin.attribute.variation.edit', compact('attributeVariation'));
    }

    public function update(AttributeVariationRequest $request)
    {
        $this->service->update($request);
        return redirect()->route('admin.attribute.variations', $request->attribute_id)->with('success', 'Cập nhật giá trị thuộc tính thành công');
    }

    public function delete($id)
    {
        $this->repository->delete($id);
        return response()->json(['status' => 'success', 'message' => 'Xóa giá trị thuộc tính thành công']);
    }
}