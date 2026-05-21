<?php

namespace Domain\Order\Actions;

use Domain\Order\Enums\OrderStatus;
use Domain\Order\Models\Entities\Order;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListPendingOrdersAction
{
    public function execute(int $perPage): LengthAwarePaginator
    {
        return Order::query()
            ->where('status', OrderStatus::Pending->value)
            ->latest()
            ->paginate($perPage);
    }
}
