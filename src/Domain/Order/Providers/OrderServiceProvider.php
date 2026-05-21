<?php

namespace Domain\Order\Providers;

use Domain\Order\Events\AssignDriverToOrder;
use Domain\Order\Listeners\PersistOrderAssignment;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Event::listen(AssignDriverToOrder::class, PersistOrderAssignment::class);
    }
}
