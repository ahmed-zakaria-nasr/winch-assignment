<?php

namespace Presentation\Cpanel\Controllers;

use Domain\Driver\Contracts\DriverContract;
use Domain\Order\Actions\ListDriverOrdersAction;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Presentation\Cpanel\Requests\ListDriverOrdersRequest;
use Presentation\Cpanel\Resources\OrderResource;

class DriverOrderController
{
    public function index(
        int $id,
        ListDriverOrdersRequest $request,
        DriverContract $driverContract,
        ListDriverOrdersAction $action,
    ): AnonymousResourceCollection {
        if ($driverContract->findById($id) === null) {
            abort(404);
        }

        return OrderResource::collection(
            $action->execute($id, $request->status(), $request->perPage())
        );
    }
}
