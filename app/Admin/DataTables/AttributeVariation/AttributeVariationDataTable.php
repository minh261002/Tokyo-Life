<?php

namespace App\Admin\DataTables\AttributeVariation;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\AttributeVariation\AttributeVariationRepositoryInterface;


class AttributeVariationDataTable extends BaseDataTable
{
    protected $nameTable = 'productAttributeValueTable';
    protected $repository;

    public function __construct(
        AttributeVariationRepositoryInterface $repository
    ) {
        $this->repository = $repository;
        parent::__construct();
    }

    public function setView(): void
    {
        $this->view = [
            'action' => 'admin.attribute.variation.datatable.action',
            'meta_value' => 'admin.attribute.variation.datatable.value',
        ];
    }
    public function query()
    {
        $attributeId = request()->route('attributeId');
        return $this->repository->getByQueryBuilder(['attribute_id' => $attributeId]);
    }

    public function setColumnSearch(): void
    {

        $this->columnAllSearch = [0, 2];
        $this->columnSearchSelect = [

        ];

    }
    protected function setCustomColumns(): void
    {
        $this->customColumns = config('datatable_columns.attribute_values', []);
    }

    protected function setCustomEditColumns(): void
    {
        $this->customEditColumns = [
            'action' => $this->view['action'],
            'value_custom' => $this->view['meta_value'],
        ];
    }

    protected function setCustomAddColumns(): void
    {
        $this->customAddColumns = [
            'action' => $this->view['action'],
            'value_custom' => $this->view['meta_value'],
        ];
    }

    protected function setCustomRawColumns(): void
    {
        $this->customRawColumns = [
            'action',
            'value_custom',
        ];
    }

    public function setCustomFilterColumns(): void
    {
        $this->customFilterColumns = [
            //
        ];
    }
}