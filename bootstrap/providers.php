<?php

use App\Providers\AppServiceProvider;
use Domain\Driver\Providers\DriverServiceProvider;
use Domain\Order\Providers\OrderServiceProvider;

return [
    AppServiceProvider::class,
    DriverServiceProvider::class,
    OrderServiceProvider::class,
];
