<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Admin\Providers\RepositoryServiceProvider::class,
    App\Admin\Providers\ServiceServiceProvider::class,
    App\Api\V1\Providers\RepositoryServiceProvider::class,
    App\Api\V1\Providers\ServiceServiceProvider::class,
];