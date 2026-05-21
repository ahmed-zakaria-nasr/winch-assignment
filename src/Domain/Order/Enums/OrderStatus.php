<?php

namespace Domain\Order\Enums;

enum OrderStatus: string
{
    case Pending = 'pending';
    case Assigned = 'assigned';
    case InTransit = 'in_transit';
    case Delivered = 'delivered';
    case Cancelled = 'cancelled';
}
