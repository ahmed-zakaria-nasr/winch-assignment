<?php

namespace Presentation\Cpanel\Providers;

use Illuminate\Support\ServiceProvider;

class CpanelServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/api.php');
    }
}
