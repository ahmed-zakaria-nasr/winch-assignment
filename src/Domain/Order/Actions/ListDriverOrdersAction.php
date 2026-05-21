<?php

namespace Domain\Order\Actions;

use Domain\Order\Enums\OrderStatus;
use Domain\Order\Models\Entities\Order;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListDriverOrdersAction
{
    public function execute(int $driverId, ?OrderStatus $status, int $perPage): LengthAwarePaginator
    {
        return Order::query()
            ->where('driver_id', $driverId)
            ->when($status !== null, fn ($query) => $query->where('status', $status->value))
            ->latest()
            ->paginate($perPage);
    }
}
