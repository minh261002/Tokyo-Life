<?php

namespace App\Admin\DataTables\Product;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Product\ProductRepositoryInterface;
use App\Enums\ActiveStatus;

class ProductDataTable extends BaseDataTable
{
    protected $nameTable = 'productTable';
    protected $repository;

    public function __construct(
        ProductRepositoryInterface $repository
    ) {
        $this->repository = $repository;
        parent::__construct();
    }
    public function setView(): void
    {
        $this->view = [
            'action' => 'admin.product.datatable.action',
            'image' => 'admin.product.datatable.image',
            'status' => 'admin.product.datatable.status',
        ];
    }
    public function query()
    {
        return $this->repository->getByQueryBuilder([['status', '!=', ActiveStatus::Deleted]]);
    }

    public function setColumnSearch(): void
    {

        $this->columnAllSearch = [1, 2, 3];
        $this->columnSearchSelect = [
            [
                'column' => 3,
                'data' => ActiveStatus::asSelectArray()
            ]
        ];

    }
    protected function setCustomColumns(): void
    {
        $this->customColumns = config('datatable_columns.products', []);
    }

    protected function setCustomEditColumns(): void
    {
        $this->customEditColumns = [
            'action' => $this->view['action'],
        ];
    }

    protected function setCustomAddColumns(): void
    {
        $this->customAddColumns = [
            'action' => $this->view['action'],
            'image' => $this->view['image'],
            'status' => $this->view['status'],
        ];
    }

    protected function setCustomRawColumns(): void
    {
        $this->customRawColumns = [
            'action',
            'image',
            'status',
        ];
    }

    public function setCustomFilterColumns(): void
    {
        $this->customFilterColumns = [
            //
        ];
    }
}