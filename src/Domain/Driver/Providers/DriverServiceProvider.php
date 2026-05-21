<?php

namespace Domain\Driver\Providers;

use Domain\Driver\Contracts\DriverContract;
use Domain\Driver\Services\DriverService;
use Illuminate\Support\ServiceProvider;

class DriverServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(DriverContract::class, DriverService::class);
    }
}
