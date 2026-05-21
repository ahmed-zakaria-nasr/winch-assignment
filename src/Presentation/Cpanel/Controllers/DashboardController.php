<?php

namespace Presentation\Cpanel\Controllers;

use Domain\Order\Actions\ListPendingOrdersAction;
use Illuminate\View\View;
use Presentation\Cpanel\Resources\OrderResource;

class DashboardController
{
    public function __invoke(ListPendingOrdersAction $action): View
    {
        $orders = OrderResource::collection(
            $action->execute(100)->items()
        )->resolve();

        return view('app', ['orders' => $orders]);
    }
}
