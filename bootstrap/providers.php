<?php

use App\Providers\AppServiceProvider;
use Domain\Driver\Providers\DriverServiceProvider;
use Domain\Order\Providers\OrderServiceProvider;
use Presentation\Cpanel\Providers\CpanelServiceProvider;

return [
    AppServiceProvider::class,
    DriverServiceProvider::class,
    OrderServiceProvider::class,
    CpanelServiceProvider::class,
];
