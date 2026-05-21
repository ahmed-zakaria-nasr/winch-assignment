<?php

namespace Presentation\Cpanel\Controllers;

use Domain\Order\Actions\AssignOrderToDriverAction;
use Presentation\Cpanel\Resources\OrderResource;

class OrderAssignmentController
{
    public function assign(int $id, AssignOrderToDriverAction $action): OrderResource
    {
        return new OrderResource($action->execute($id));
    }
}
