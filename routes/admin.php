<?php

use App\Admin\Http\Controllers\Admin\AdminController;
use App\Admin\Http\Controllers\Attribute\AttributeController;
use App\Admin\Http\Controllers\AttributeVariation\AttributeVariationController;
use App\Admin\Http\Controllers\Category\CategoryController;
use App\Admin\Http\Controllers\Customer\CustomerController;
use App\Admin\Http\Controllers\Auth\AuthController;
use App\Admin\Http\Controllers\Dashboard\DashboardController;
use App\Admin\Http\Controllers\Module\ModuleController;
use App\Admin\Http\Controllers\Permission\PermissionController;
use App\Admin\Http\Controllers\Post\PostCatalogueController;
use App\Admin\Http\Controllers\Post\PostController;
use App\Admin\Http\Controllers\Product\ProductAttributeController;
use App\Admin\Http\Controllers\Product\ProductController;
use App\Admin\Http\Controllers\Role\RoleController;
use App\Admin\Http\Controllers\Product\ProductVariationController;
use App\Admin\Http\Controllers\Slider\SliderController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->as('admin.')->group(function () {

    Route::middleware(['admin'])->group(function () {
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.post');

        Route::get('/password/forgot', [AuthController::class, 'forgotPassword'])->name('password.forgot');
        Route::post('/password/email', [AuthController::class, 'sendResetLink'])->name('password.email');

        Route::get('/password/reset', [AuthController::class, 'resetPassword'])->name('password.reset');
        Route::post('/password/update', [AuthController::class, 'updatePassword'])->name('password.update');
    });


    Route::middleware(['auth:admin'])->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::prefix('module')->as('module.')->group(function () {
            Route::middleware(['permission:viewModule'])->group(function () {
                Route::get('/', [ModuleController::class, 'index'])->name('index');
            });

            Route::middleware(['permission:createModule'])->group(function () {
                Route::get('/create', [ModuleController::class, 'create'])->name('create');
                Route::post('/store', [ModuleController::class, 'store'])->name('store');
            });

            Route::middleware(['permission:editModule'])->group(function () {
                Route::get('/edit/{id}', [ModuleController::class, 'edit'])->name('edit');
                Route::put('/update', [ModuleController::class, 'update'])->name('update');
            });

            Route::middleware(['permission:deleteModule'])->group(function () {
                Route::delete('/delete/{id}', [ModuleController::class, 'delete'])->name('delete');
            });
        });

        Route::prefix('permission')->as('permission.')->group(function () {
            Route::middleware(['permission:viewPermission'])->group(function () {
                Route::get('/', [PermissionController::class, 'index'])->name('index');
            });

            Route::middleware(['permission:createPermission'])->group(function () {
                Route::get('/create', [PermissionController::class, 'create'])->name('create');
                Route::post('/store', [PermissionController::class, 'store'])->name('store');
            });

            Route::middleware(['permission:editPermission'])->group(function () {
                Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('edit');
                Route::put('/update', [PermissionController::class, 'update'])->name('update');
            });

            Route::middleware(['permission:deletePermission'])->group(function () {
                Route::delete('/delete/{id}', [PermissionController::class, 'delete'])->name('delete');
            });
        });

        Route::prefix('role')->as('role.')->group(function () {
            Route::middleware(['permission:viewRole'])->group(function () {
                Route::get('/', [RoleController::class, 'index'])->name('index');
            });

            Route::middleware(['permission:createRole'])->group(function () {
                Route::get('/create', [RoleController::class, 'create'])->name('create');
                Route::post('/store', [RoleController::class, 'store'])->name('store');
            });

            Route::middleware(['permission:editRole'])->group(function () {
                Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
                Route::put('/update', [RoleController::class, 'update'])->name('update');
            });

            Route::middleware(['permission:deleteRole'])->group(function () {
                Route::delete('/delete/{id}', [RoleController::class, 'delete'])->name('delete');
            });
        });

        Route::prefix('admin')->as('admin.')->group(function () {
            Route::middleware(['permission:viewAdmin'])->group(function () {
                Route::get('/', [AdminController::class, 'index'])->name('index');
            });

            Route::middleware(['permission:createAdmin'])->group(function () {
                Route::get('/create', [AdminController::class, 'create'])->name('create');
                Route::post('/store', [AdminController::class, 'store'])->name('store');
            });

            Route::middleware(['permission:editAdmin'])->group(function () {
                Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
                Route::put('/update', [AdminController::class, 'update'])->name('update');
            });

            Route::middleware(['permission:deleteAdmin'])->group(function () {
                Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('delete');
            });
        });


        Route::prefix('customer')->as('customer.')->group(function () {
            Route::middleware(['permission:viewCustomer'])->group(function () {
                Route::get('/', [CustomerController::class, 'index'])->name('index');
            });

            Route::middleware(['permission:createCustomer'])->group(function () {
                Route::get('/create', [CustomerController::class, 'create'])->name('create');
                Route::post('/store', [CustomerController::class, 'store'])->name('store');
            });

            Route::middleware(['permission:editCustomer'])->group(function () {
                Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('edit');
                Route::put('/update', [CustomerController::class, 'update'])->name('update');
                Route::patch('/update-status', [CustomerController::class, 'updateStatus'])->name('update.status');
            });

            Route::middleware(['permission:deleteCustomer'])->group(function () {
                Route::delete('/delete/{id}', [CustomerController::class, 'delete'])->name('delete');
            });
        });

        Route::prefix('post-catalogue')->as('post_catalogue.')->group(function () {
            Route::middleware(['permission:viewPostCatalogue'])->group(function () {
                Route::get('/', [PostCatalogueController::class, 'index'])->name('index');
                Route::get('/get', [PostCatalogueController::class, 'get'])->name('get');
            });

            Route::middleware(['permission:createPostCatalogue'])->group(function () {
                Route::get('/create', [PostCatalogueController::class, 'create'])->name('create');
                Route::post('/store', [PostCatalogueController::class, 'store'])->name('store');
            });

            Route::middleware(['permission:editPostCatalogue'])->group(function () {
                Route::get('/edit/{id}', [PostCatalogueController::class, 'edit'])->name('edit');
                Route::put('/update', [PostCatalogueController::class, 'update'])->name('update');
                Route::patch('/update-status', [PostCatalogueController::class, 'updateStatus'])->name('update.status');
            });

            Route::middleware(['permission:deletePostCatalogue'])->group(function () {
                Route::delete('/delete/{id}', [PostCatalogueController::class, 'delete'])->name('delete');
            });
        });

        Route::prefix('post')->as('post.')->group(function () {
            Route::middleware(['permission:viewPost'])->group(function () {
                Route::get('/', [PostController::class, 'index'])->name('index');
            });

            Route::middleware(['permission:createPost'])->group(function () {
                Route::get('/create', [PostController::class, 'create'])->name('create');
                Route::post('/store', [PostController::class, 'store'])->name('store');
            });

            Route::middleware(['permission:editPost'])->group(function () {
                Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');
                Route::put('/update', [PostController::class, 'update'])->name('update');
                Route::patch('/update-status', [PostController::class, 'updateStatus'])->name('update.status');
            });

            Route::middleware(['permission:deletePost'])->group(function () {
                Route::delete('/delete/{id}', [PostController::class, 'delete'])->name('delete');
            });
        });

        Route::prefix('category')->as('category.')->group(function () {
            Route::middleware(['permission:viewCategory'])->group(function () {
                Route::get('/', [CategoryController::class, 'index'])->name('index');
                Route::get('/get', [CategoryController::class, 'get'])->name('get');
            });

            Route::middleware(['permission:createCategory'])->group(function () {
                Route::get('/create', [CategoryController::class, 'create'])->name('create');
                Route::post('/store', [CategoryController::class, 'store'])->name('store');
            });

            Route::middleware(['permission:editCategory'])->group(function () {
                Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
                Route::put('/update', [CategoryController::class, 'update'])->name('update');
                Route::patch('/update-status', [CategoryController::class, 'updateStatus'])->name('update.status');
            });

            Route::middleware(['permission:deleteCategory'])->group(function () {
                Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
            });
        });

        Route::prefix('attribute')->as('attribute.')->group(function () {
            Route::middleware(['permission:viewAttribute'])->group(function () {
                Route::get('/', [AttributeController::class, 'index'])->name('index');
                Route::get('/{attributeId}/variation', [AttributeVariationController::class, 'index'])->name('variations');
            });

            Route::middleware(['permission:createAttribute'])->group(function () {
                Route::get('/create', [AttributeController::class, 'create'])->name('create');
                Route::post('/store', [AttributeController::class, 'store'])->name('store');

                Route::get('/{attributeId}/variation/create', [AttributeVariationController::class, 'create'])->name('variation.create');
                Route::post('/variation/store', [AttributeVariationController::class, 'store'])->name('variation.store');
            });

            Route::middleware(['permission:editAttribute'])->group(function () {
                Route::get('/edit/{id}', [AttributeController::class, 'edit'])->name('edit');
                Route::put('/update', [AttributeController::class, 'update'])->name('update');

                Route::get('/variation/edit/{id}', [AttributeVariationController::class, 'edit'])->name('variation.edit');
                Route::put('/variation/update', [AttributeVariationController::class, 'update'])->name('variation.update');
            });

            Route::middleware(['permission:deleteAttribute'])->group(function () {
                Route::delete('/delete/{id}', [AttributeController::class, 'delete'])->name('delete');

                Route::delete('/variation/delete/{id}', [AttributeVariationController::class, 'delete'])->name('variation.delete');
            });
        });

        Route::prefix('product')->group(function () {
            Route::middleware(['permission:viewProduct'])->group(function () {
                Route::get('/', [ProductController::class, 'index'])->name('product.index');

                Route::prefix('attributes')->group(function () {
                    Route::get('/get', [ProductAttributeController::class, 'create'])->name('product.attributes.get');
                });

                Route::prefix('variations')->group(function () {
                    Route::get('/check', [ProductVariationController::class, 'check'])->name('product.variations.check');
                    Route::get('/create', [ProductVariationController::class, 'create'])->name('product.variations.create');
                    Route::get('/delete/{id}', [ProductVariationController::class, 'delete'])->name('product.variations.delete');
                });
            });

            Route::middleware(['permission:createProduct'])->group(function () {
                Route::get('/create', [ProductController::class, 'create'])->name('product.create');
                Route::post('/store', [ProductController::class, 'store'])->name('product.store');
            });

            Route::middleware(['permission:editProduct'])->group(function () {
                Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
                Route::put('/update', [ProductController::class, 'update'])->name('product.update');
                Route::patch('/update/status', [ProductController::class, 'updateStatus'])->name('product.update.status');
            });

            Route::middleware(['permission:deleteProduct'])->group(function () {
                Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
            });
        });

        //quản lý slider
        Route::prefix('slider')->group(function () {
            Route::middleware(['permission:viewSlider'])->group(function () {
                Route::get('/', [SliderController::class, 'index'])->name('slider.index');
            });

            Route::middleware(['permission:createSlider'])->group(function () {
                Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
                Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
            });

            Route::middleware(['permission:editSlider'])->group(function () {
                Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
                Route::put('/update', [SliderController::class, 'update'])->name('slider.update');
                Route::patch('/update/status', [SliderController::class, 'updateStatus'])->name('slider.update.status');
            });

            Route::middleware(['permission:deleteSlider'])->group(function () {
                Route::delete('/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');
            });
        });

        //quản lý slider item
        Route::prefix('slider/{id}/item')->group(function () {
            Route::middleware(['permission:viewSlider'])->group(function () {
                Route::get('/', [SliderController::class, 'indexItem'])->name('slider.item.index');
            });

            Route::middleware(['permission:createSlider'])->group(function () {
                Route::get('/create', [SliderController::class, 'createItem'])->name('slider.item.create');
                Route::post('/store', [SliderController::class, 'storeItem'])->name('slider.item.store');
            });
        });

        Route::middleware(['permission:deleteSlider'])->group(function () {
            Route::delete('slider-item/delete/{id}', [SliderController::class, 'deleteItem'])->name('slider.item.delete');
        });

        Route::middleware(['permission:editSlider'])->group(function () {
            Route::get('slider-item/edit/{id}', [SliderController::class, 'editItem'])->name('slider.item.edit');
            Route::put('slider-item/update', [SliderController::class, 'updateItem'])->name('slider.item.update');
        });
    });
});
