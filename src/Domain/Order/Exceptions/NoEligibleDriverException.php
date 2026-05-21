<?php

namespace Domain\Order\Exceptions;

use RuntimeException;

class NoEligibleDriverException extends RuntimeException
{
    public function __construct(int $orderId)
    {
        parent::__construct("No eligible driver found for order [{$orderId}].");
    }
}
