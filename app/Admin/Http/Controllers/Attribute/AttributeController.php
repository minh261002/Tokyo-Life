<?php

namespace App\Admin\Http\Controllers\Attribute;

use App\Admin\DataTables\Attribute\AttributeDataTable;
use App\Admin\Http\Requests\Attribute\AttributeRequest;
use App\Admin\Repositories\Attribute\AttributeRepositoryInterface;
use App\Admin\Services\Attribute\AttributeServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    protected $repository;
    protected $service;

    public function __construct(
        AttributeRepositoryInterface $repository,
        AttributeServiceInterface $service
    ) {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index(AttributeDataTable $dataTable)
    {
        return $dataTable->render('admin.attribute.index');
    }

    public function create()
    {
        return view('admin.attribute.create');
    }

    public function store(AttributeRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('admin.attribute.index')->with('success', 'Thêm mới thuộc tính thành công');
    }

    public function edit($id)
    {
        $attribute = $this->repository->find($id);
        return view('admin.attribute.edit', compact('attribute'));
    }

    public function update(AttributeRequest $request)
    {
        $this->service->update($request);
        return redirect()->route('admin.attribute.index')->with('success', 'Cập nhật thuộc tính thành công');
    }

    public function delete($id)
    {
        $this->repository->delete($id);
        return response()->json([
            'status' => 'success',
            'message' => 'Xóa thuộc tính thành công'
        ]);
    }
}