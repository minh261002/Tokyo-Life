<?php

namespace Routes\Api;

use App\Api\V1\Http\Controllers\Auth\AuthController;
use App\Api\V1\Http\Controllers\Slider\SliderController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'v1',
    'middleware' => []
], function () {
    Route::get('/provinces', [LocationController::class, 'getProvinces']);
    Route::get('/districts/{province_code}', [LocationController::class, 'getDistricts']);
    Route::get('/wards/{district_code}', [LocationController::class, 'getWards']);


    Route::group([
        'middleware' => ['jwt'],
        'prefix' => 'auth'
    ], function ($router) {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('me', [AuthController::class, 'me']);
    });

    Route::post('auth/login', [AuthController::class, 'login']);
    Route::post('auth/forgot-password', [AuthController::class, 'sendLinkResetPassword']);
    Route::post('auth/reset-password', [AuthController::class, 'resetPassword']);
    Route::post('auth/register', [AuthController::class, 'register']);

    Route::prefix('sliders')->group(function () {
        Route::get('/', [SliderController::class, 'index']);
        Route::get('/{key}', [SliderController::class, 'show']);
    });



    Route::middleware(['jwt', 'auth:api'])->group(function () {
    });
});
