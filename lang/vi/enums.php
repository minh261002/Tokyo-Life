<?php

use App\Enums\ActiveStatus;
use App\Enums\Module\ModuleStatus;

return [
    ActiveStatus::class => [
        ActiveStatus::Active->value => 'Đang hoạt động',
        ActiveStatus::Inactive->value => 'Không hoạt động',
        ActiveStatus::Deleted->value => 'Đã xóa',
    ],

    ModuleStatus::class => [
        ModuleStatus::Completed->value => 'Hoàn thành',
        ModuleStatus::InProgress->value => 'Đang tiến hành',
    ],
];