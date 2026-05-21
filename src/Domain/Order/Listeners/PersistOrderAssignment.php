<?php

namespace Domain\Order\Listeners;

use Domain\Driver\Contracts\DriverContract;
use Domain\Order\Enums\OrderStatus;
use Domain\Order\Events\AssignDriverToOrder;
use Domain\Order\Events\OrderAssigned;

class PersistOrderAssignment
{
    public function __construct(
        private readonly DriverContract $driverContract,
    ) {}

    public function handle(AssignDriverToOrder $event): void
    {
        $event->order->update([
            'driver_id' => $event->driver->id,
            'status' => OrderStatus::Assigned,
            'assigned_at' => now(),
        ]);

        $this->driverContract->markUnavailable($event->driver->id);

        OrderAssigned::dispatch($event->order->fresh());
    }
}
