<?php

namespace App\Admin\DataTables\Attribute;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Attribute\AttributeRepositoryInterface;

class AttributeDataTable extends BaseDataTable
{
    protected $nameTable = 'attributeTable';
    protected $repository;

    public function __construct(
        AttributeRepositoryInterface $repository
    ) {
        $this->repository = $repository;
        parent::__construct();
    }

    public function setView(): void
    {
        $this->view = [
            'action' => 'admin.attribute.datatable.action',
            'description' => 'admin.attribute.datatable.description',
            'type' => 'admin.attribute.datatable.type',
        ];
    }

    public function query()
    {
        return $this->repository->getQueryBuilderOrderBy();
    }

    public function setColumnSearch(): void
    {

        $this->columnAllSearch = [0, 1, 2, 3];
        $this->columnSearchSelect = [
            [
                'column' => 1,
                'data' => [
                    '1' => 'Màu sắc',
                    '2' => 'Nút',
                ]
            ],
        ];

    }

    protected function setCustomColumns(): void
    {
        $this->customColumns = config('datatable_columns.attributes', []);
    }

    protected function setCustomEditColumns(): void
    {
        $this->customEditColumns = [
            'action' => $this->view['action'],
            'description' => $this->view['description'],
            'type' => $this->view['type'],
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
            'description',
            'type',
        ];
    }

    public function setCustomFilterColumns(): void
    {
        $this->customFilterColumns = [
            //
        ];
    }
}