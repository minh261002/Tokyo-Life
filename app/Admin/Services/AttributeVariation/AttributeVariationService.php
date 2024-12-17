<?php

namespace App\Admin\Services\AttributeVariation;

use App\Admin\Repositories\AttributeVariation\AttributeVariationRepositoryInterface;
use Illuminate\Http\Request;

class AttributeVariationService implements AttributeVariationServiceInterface
{
    protected $repository;

    public function __construct(
        AttributeVariationRepositoryInterface $repository,
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