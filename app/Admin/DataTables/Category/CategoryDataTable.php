<?php

namespace App\Admin\DataTables\Category;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Category\CategoryRepositoryInterface;

class CategoryDataTable extends BaseDataTable
{
    protected $nameTable = 'categoryTable';
    protected $repository;

    public function __construct(
        CategoryRepositoryInterface $repository
    ) {
        $this->repository = $repository;
        parent::__construct();
    }

    public function setView(): void
    {
        $this->view = [
            'action' => 'admin.category.datatable.action',
            'image' => 'admin.category.datatable.image',
            'status' => 'admin.category.datatable.status',
            'show_home' => 'admin.category.datatable.show_home',
            'show_menu' => 'admin.category.datatable.show_menu',
        ];
    }

    public function query()
    {
        return $this->repository->getFlatTreeBuilder();
    }

    public function setColumnSearch(): void
    {

        $this->columnAllSearch = [1, 2, 3, 4];
        $this->columnSearchSelect = [
            [
                'column' => 4,
                'data' => [
                    '1' => 'Không hoạt động',
                    '2' => 'Đang hoạt động',
                ]
            ],
            [
                'column' => 2,
                'data' => [
                    '1' => 'Không hiển thị',
                    '2' => 'Hiển thị',
                ]
            ],
            [
                'column' => 3,
                'data' => [
                    '1' => 'Không hiển thị',
                    '2' => 'Hiển thị',
                ]
            ],
        ];

    }

    protected function setCustomColumns(): void
    {
        $this->customColumns = config('datatable_columns.categories', []);
    }

    protected function setCustomEditColumns(): void
    {
        $this->customEditColumns = [
            'action' => $this->view['action'],
            'image' => $this->view['image'],
            'status' => $this->view['status'],
            'name' => function ($query) {
                return generate_text_depth_tree($query->depth) . $query->name;
            },
            'show_home' => $this->view['show_home'],
            'show_menu' => $this->view['show_menu'],
        ];
    }

    protected function setCustomAddColumns(): void
    {
        $this->customAddColumns = [
            'action' => $this->view['action'],
        ];
    }

    protected function setCustomRawColumns(): void
    {
        $this->customRawColumns = [
            'action',
            'image',
            'status',
            'show_home',
            'show_menu',
        ];
    }

    public function setCustomFilterColumns(): void
    {
        $this->customFilterColumns = [
            //
        ];
    }
}