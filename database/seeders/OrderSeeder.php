<?php

namespace Database\Seeders;

use Domain\Order\Enums\OrderStatus;
use Domain\Order\Models\Entities\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $orders = [
            ['pickup_latitude' => 31.952000, 'pickup_longitude' => 35.905000],
            ['pickup_latitude' => 31.958000, 'pickup_longitude' => 35.915000],
            ['pickup_latitude' => 31.948000, 'pickup_longitude' => 35.900000],
            ['pickup_latitude' => 31.962000, 'pickup_longitude' => 35.925000],
            ['pickup_latitude' => 31.942000, 'pickup_longitude' => 35.892000],
            ['pickup_latitude' => 31.955500, 'pickup_longitude' => 35.908000],
            ['pickup_latitude' => 31.950000, 'pickup_longitude' => 35.912000],
            ['pickup_latitude' => 31.947000, 'pickup_longitude' => 35.898000],
        ];

        foreach ($orders as $order) {
            Order::query()->create([
                ...$order,
                'status' => OrderStatus::Pending,
            ]);
        }
    }
}
