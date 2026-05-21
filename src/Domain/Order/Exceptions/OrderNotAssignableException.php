<?php

namespace Domain\Order\Exceptions;

use RuntimeException;

class OrderNotAssignableException extends RuntimeException
{
    public function __construct(int $orderId)
    {
        parent::__construct("Order [{$orderId}] is not assignable.");
    }
}
