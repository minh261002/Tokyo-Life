<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modules')->insert([
            [
                'name' => 'Quản lý module',
                'description' => 'Quản lý module',
                'status' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quản lý quyền',
                'description' => 'Quản lý quyền',
                'status' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quản lý vai trò',
                'description' => 'Quản lý vai trò',
                'status' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quản lý admin',
                'description' => 'Quản lý admin',
                'status' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quản lý thành viên',
                'description' => 'Quản lý thành viên',
                'status' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quản lý chuyên mục',
                'description' => 'Quản lý chuyên mục',
                'status' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quản lý bài viết',
                'description' => 'Quản lý bài viết',
                'status' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quản lý danh mục',
                'description' => 'Quản lý danh mục',
                'status' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quản lý slider',
                'description' => 'Quản lý slider',
                'status' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quản lý thông báo',
                'description' => 'Quản lý thông báo',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quản lý thuộc tính',
                'description' => 'Quản lý thuộc tính',
                'status' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quản lý sản phẩm',
                'description' => 'Quản lý sản phẩm',
                'status' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quản lý mã giảm giá',
                'description' => 'Quản lý mã giảm giá',
                'status' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quản lý đánh giá',
                'description' => 'Quản lý đánh giá',
                'status' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quản lý đơn hàng',
                'description' => 'Quản lý đơn hàng',
                'status' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}