<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'title' => 'Xem module',
            'name' => 'viewModule',
            'guard_name' => 'admin',
            'module_id' => 1,
        ]);

        Permission::create([
            'title' => 'Thêm module',
            'name' => 'createModule',
            'guard_name' => 'admin',
            'module_id' => 1,
        ]);

        Permission::create([
            'title' => 'Sửa module',
            'name' => 'editModule',
            'guard_name' => 'admin',
            'module_id' => 1,
        ]);

        Permission::create([
            'title' => 'Xoá module',
            'name' => 'deleteModule',
            'guard_name' => 'admin',
            'module_id' => 1,
        ]);

        Permission::create([
            'title' => 'Xem quyền',
            'name' => 'viewPermission',
            'guard_name' => 'admin',
            'module_id' => 2,
        ]);

        Permission::create([
            'title' => 'Thêm quyền',
            'name' => 'createPermission',
            'guard_name' => 'admin',
            'module_id' => 2,
        ]);

        Permission::create([
            'title' => 'Sửa quyền',
            'name' => 'editPermission',
            'guard_name' => 'admin',
            'module_id' => 2,
        ]);

        Permission::create([
            'title' => 'Xoá quyền',
            'name' => 'deletePermission',
            'guard_name' => 'admin',
            'module_id' => 2,
        ]);

        Permission::create([
            'title' => 'Xem vai trò',
            'name' => 'viewRole',
            'guard_name' => 'admin',
            'module_id' => 3,
        ]);

        Permission::create([
            'title' => 'Thêm vai trò',
            'name' => 'createRole',
            'guard_name' => 'admin',
            'module_id' => 3,
        ]);

        Permission::create([
            'title' => 'Sửa vai trò',
            'name' => 'editRole',
            'guard_name' => 'admin',
            'module_id' => 3,
        ]);

        Permission::create([
            'title' => 'Xoá vai trò',
            'name' => 'deleteRole',
            'guard_name' => 'admin',
            'module_id' => 3,
        ]);

        Permission::create([
            'title' => 'Xem admin',
            'name' => 'viewAdmin',
            'guard_name' => 'admin',
            'module_id' => 4,
        ]);

        Permission::create([
            'title' => 'Thêm admin',
            'name' => 'createAdmin',
            'guard_name' => 'admin',
            'module_id' => 4,
        ]);

        Permission::create([
            'title' => 'Sửa admin',
            'name' => 'editAdmin',
            'guard_name' => 'admin',
            'module_id' => 4,
        ]);

        Permission::create([
            'title' => 'Xoá admin',
            'name' => 'deleteAdmin',
            'guard_name' => 'admin',
            'module_id' => 4,
        ]);

        Permission::create([
            'title' => 'Xem thành viên',
            'name' => 'viewCustomer',
            'guard_name' => 'admin',
            'module_id' => 5,
        ]);

        Permission::create([
            'title' => 'Thêm thành viên',
            'name' => 'createCustomer',
            'guard_name' => 'admin',
            'module_id' => 5,
        ]);

        Permission::create([
            'title' => 'Sửa thành viên',
            'name' => 'editCustomer',
            'guard_name' => 'admin',
            'module_id' => 5,
        ]);

        Permission::create([
            'title' => 'Xoá thành viên',
            'name' => 'deleteCustomer',
            'guard_name' => 'admin',
            'module_id' => 5,
        ]);

        Permission::create([
            'title' => 'Xem chuyên mục',
            'name' => 'viewPostCatalogue',
            'guard_name' => 'admin',
            'module_id' => 6,
        ]);

        Permission::create([
            'title' => 'Thêm chuyên mục',
            'name' => 'createPostCatalogue',
            'guard_name' => 'admin',
            'module_id' => 6,
        ]);

        Permission::create([
            'title' => 'Sửa chuyên mục',
            'name' => 'editPostCatalogue',
            'guard_name' => 'admin',
            'module_id' => 6,
        ]);

        Permission::create([
            'title' => 'Xoá chuyên mục',
            'name' => 'deletePostCatalogue',
            'guard_name' => 'admin',
            'module_id' => 6,
        ]);

        Permission::create([
            'title' => 'Xem bài viết',
            'name' => 'viewPost',
            'guard_name' => 'admin',
            'module_id' => 7,
        ]);

        Permission::create([
            'title' => 'Thêm bài viết',
            'name' => 'createPost',
            'guard_name' => 'admin',
            'module_id' => 7,
        ]);

        Permission::create([
            'title' => 'Sửa bài viết',
            'name' => 'editPost',
            'guard_name' => 'admin',
            'module_id' => 7,
        ]);

        Permission::create([
            'title' => 'Xoá bài viết',
            'name' => 'deletePost',
            'guard_name' => 'admin',
            'module_id' => 7,
        ]);

        Permission::create([
            'title' => 'Xem danh mục',
            'name' => 'viewCategory',
            'guard_name' => 'admin',
            'module_id' => 8,
        ]);

        Permission::create([
            'title' => 'Thêm danh mục',
            'name' => 'createCategory',
            'guard_name' => 'admin',
            'module_id' => 8,
        ]);

        Permission::create([
            'title' => 'Sửa danh mục',
            'name' => 'editCategory',
            'guard_name' => 'admin',
            'module_id' => 8,
        ]);

        Permission::create([
            'title' => 'Xoá danh mục',
            'name' => 'deleteCategory',
            'guard_name' => 'admin',
            'module_id' => 8,
        ]);

        Permission::create([
            'title' => 'Xem slider',
            'name' => 'viewSlider',
            'guard_name' => 'admin',
            'module_id' => 9,
        ]);

        Permission::create([
            'title' => 'Thêm slider',
            'name' => 'createSlider',
            'guard_name' => 'admin',
            'module_id' => 9,
        ]);

        Permission::create([
            'title' => 'Sửa slider',
            'name' => 'editSlider',
            'guard_name' => 'admin',
            'module_id' => 9,
        ]);

        Permission::create([
            'title' => 'Xoá slider',
            'name' => 'deleteSlider',
            'guard_name' => 'admin',
            'module_id' => 9,
        ]);

        Permission::create([
            'title' => 'Xem thông báo',
            'name' => 'viewNotification',
            'guard_name' => 'admin',
            'module_id' => 10,
        ]);

        Permission::create([
            'title' => 'Thêm thông báo',
            'name' => 'createNotification',
            'guard_name' => 'admin',
            'module_id' => 10,
        ]);

        Permission::create([
            'title' => 'Xoá thông báo',
            'name' => 'deleteNotification',
            'guard_name' => 'admin',
            'module_id' => 10,
        ]);

        Permission::create([
            'title' => 'Xem thuộc tính',
            'name' => 'viewAttribute',
            'guard_name' => 'admin',
            'module_id' => 11,
        ]);

        Permission::create([
            'title' => 'Thêm thuộc tính',
            'name' => 'createAttribute',
            'guard_name' => 'admin',
            'module_id' => 11,
        ]);

        Permission::create([
            'title' => 'Sửa thuộc tính',
            'name' => 'editAttribute',
            'guard_name' => 'admin',
            'module_id' => 11,
        ]);

        Permission::create([
            'title' => 'Xoá thuộc tính',
            'name' => 'deleteAttribute',
            'guard_name' => 'admin',
            'module_id' => 11,
        ]);

        Permission::create([
            'title' => 'Xem sản phẩm',
            'name' => 'viewProduct',
            'guard_name' => 'admin',
            'module_id' => 12,
        ]);

        Permission::create([
            'title' => 'Thêm sản phẩm',
            'name' => 'createProduct',
            'guard_name' => 'admin',
            'module_id' => 12,
        ]);

        Permission::create([
            'title' => 'Sửa sản phẩm',
            'name' => 'editProduct',
            'guard_name' => 'admin',
            'module_id' => 12,
        ]);

        Permission::create([
            'title' => 'Xoá sản phẩm',
            'name' => 'deleteProduct',
            'guard_name' => 'admin',
            'module_id' => 12,
        ]);

        Permission::create([
            'title' => 'Xem mã giảm giá',
            'name' => 'viewDiscount',
            'guard_name' => 'admin',
            'module_id' => 13,
        ]);

        Permission::create([
            'title' => 'Thêm mã giảm giá',
            'name' => 'createDiscount',
            'guard_name' => 'admin',
            'module_id' => 13,
        ]);

        Permission::create([
            'title' => 'Sửa mã giảm giá',
            'name' => 'editDiscount',
            'guard_name' => 'admin',
            'module_id' => 13,
        ]);

        Permission::create([
            'title' => 'Xoá mã giảm giá',
            'name' => 'deleteDiscount',
            'guard_name' => 'admin',
            'module_id' => 13,
        ]);

        Permission::create([
            'title' => 'Xem đánh giá',
            'name' => 'viewReview',
            'guard_name' => 'admin',
            'module_id' => 14,
        ]);

        Permission::create([
            'title' => 'Xem đơn hàng',
            'name' => 'viewOrder',
            'guard_name' => 'admin',
            'module_id' => 15,
        ]);

        Permission::create([
            'title' => 'Thêm đơn hàng',
            'name' => 'createOrder',
            'guard_name' => 'admin',
            'module_id' => 15,
        ]);

        Permission::create([
            'title' => 'Sửa đơn hàng',
            'name' => 'editOrder',
            'guard_name' => 'admin',
            'module_id' => 15,
        ]);
    }
}
