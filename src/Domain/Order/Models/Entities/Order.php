<?php

namespace Domain\Order\Models\Entities;

use Domain\Order\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'pickup_latitude',
        'pickup_longitude',
        'status',
        'driver_id',
        'assigned_at',
    ];

    protected function casts(): array
    {
        return [
            'pickup_latitude' => 'float',
            'pickup_longitude' => 'float',
            'status' => OrderStatus::class,
            'assigned_at' => 'datetime',
        ];
    }
}
