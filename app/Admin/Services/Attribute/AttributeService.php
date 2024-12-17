<?php

namespace App\Admin\Services\Attribute;

use App\Admin\Repositories\Attribute\AttributeRepositoryInterface;
use Illuminate\Http\Request;

class AttributeService implements AttributeServiceInterface
{
    protected $repository;

    public function __construct(
        AttributeRepositoryInterface $repository,
    ) {
        $this->repository = $repository;
    }

    public function store(Request $request)
    {
        $data = $request->validated();
        return $this->repository->create($data);
    }

    public function update(Request $request)
    {
        $data = $request->validated();
        return $this->repository->update($data['id'], $data);
    }
}