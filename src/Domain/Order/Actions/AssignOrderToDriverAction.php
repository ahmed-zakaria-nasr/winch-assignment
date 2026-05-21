<?php

namespace Domain\Order\Actions;

use Domain\Driver\Contracts\DriverContract;
use Domain\Order\Enums\OrderStatus;
use Domain\Order\Events\AssignDriverToOrder;
use Domain\Order\Exceptions\NoEligibleDriverException;
use Domain\Order\Exceptions\OrderNotAssignableException;
use Domain\Order\Models\Entities\Order;
use Illuminate\Support\Facades\DB;

class AssignOrderToDriverAction
{
    public function __construct(
        private readonly DriverContract $driverContract,
    ) {}

    public function execute(int $orderId): Order
    {
        return DB::transaction(function () use ($orderId) {
            $order = Order::query()
                ->whereKey($orderId)
                ->lockForUpdate()
                ->firstOrFail();

            if ($order->status !== OrderStatus::Pending) {
                throw new OrderNotAssignableException($orderId);
            }

            $driver = $this->driverContract->findNearestAvailable(
                $order->pickup_latitude,
                $order->pickup_longitude,
            );

            if ($driver === null) {
                throw new NoEligibleDriverException($orderId);
            }

            AssignDriverToOrder::dispatch($order, $driver);

            return $order->fresh();
        });
    }
}
