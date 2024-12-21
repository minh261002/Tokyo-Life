<?php

namespace App\Api\V1\Http\Controllers\Slider;

use App\Api\V1\Http\Resources\Slider\SliderResource;
use App\Api\V1\Repositories\Slider\SliderRepositoryInterface;
use App\Enums\ActiveStatus;
use App\Http\Controllers\Controller;

/**
 * @Group Slider
 */

class SliderController extends Controller
{
    protected $repository;

    public function __construct(SliderRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Danh sách slider
     *
     * Api này trả về danh sách tất cả slider đang hoạt động
     *
     * @Response {
     *"status": 200,
     *"data": [
     *{
     *"id": 3,
     *"name": "Home",
     *"desc": null,
     *"items": [
     *{
     *"id": 2,
     *"title": "Slider 1",
     *"link": null,
     *"image": "http://localhost:8000/uploads/images/1733029495615609.webp",
     *"mobile_image": "http://localhost:8000"
     *},
     *{
     *"id": 3,
     *"title": "Slider 2",
     *"link": null,
     *"image": "http://localhost:8000/uploads/images/17333848919572643.webp",
     *"mobile_image": "http://localhost:8000"
     *},
     *{
     *"id": 4,
     *"title": "Slider 3",
     *"link": null,
     *"image": "http://localhost:8000/uploads/images/17339740636494975.webp",
     *"mobile_image": "http://localhost:8000"
     *},
     *{
     *"id": 5,
     *"title": "Slider 4",
     *"link": null,
     *"image": "http://localhost:8000/uploads/images/17344029140882484.webp",
     *"mobile_image": "http://localhost:8000"
     *}
     *]
     *}
     *]
     *}
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function index()
    {
        try {
            $sliders = $this->repository->getByQueryBuilder(['status' => ActiveStatus::Active], ['items'])->get();

            return response()->json([
                'status' => 200,
                'data' => SliderResource::collection($sliders)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Chi tiết slider
     *
     * Api này trả về chi tiết slider theo id
     *
     * @urlParam id integer required Id của slider
     *
     * @Response {
     *"status": 200,
     *"data": {
     *"id": 3,
     *"name": "Home",
     *"desc": null,
     *"items": [
     *{
     *"id": 2,
     *"title": "Slider 1",
     *"link": null,
     *"image": "http://localhost:8000/uploads/images/1733029495615609.webp",
     *"mobile_image": "http://localhost:8000"
     *},
     *{
     *"id": 3,
     *"title": "Slider 2",
     *"link": null,
     *"image": "http://localhost:8000/uploads/images/17333848919572643.webp",
     *"mobile_image": "http://localhost:8000"
     *},
     *{
     *"id": 4,
     *"title": "Slider 3",
     *"link": null,
     *"image": "http://localhost:8000/uploads/images/17339740636494975.webp",
     *"mobile_image": "http://localhost:8000"
     *},
     *{
     *"id": 5,
     *"title": "Slider 4",
     *"link": null,
     *"image": "http://localhost:8000/uploads/images/17344029140882484.webp",
     *"mobile_image": "http://localhost:8000"
     *}
     *]
     *}
     *}
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function show($id)
    {
        try {
            $slider = $this->repository->findOrFail($id);

            return response()->json([
                'status' => 200,
                'data' => new SliderResource($slider)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }
}
