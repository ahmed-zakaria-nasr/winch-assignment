<?php

namespace Database\Seeders;

use Domain\Driver\Models\Entities\Driver;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    public function run(): void
    {
        $drivers = [
            ['name' => 'Ahmad Khalil', 'phone' => '0791111111', 'latitude' => 31.953900, 'longitude' => 35.910600, 'is_available' => true],
            ['name' => 'Omar Saleh', 'phone' => '0792222222', 'latitude' => 31.960000, 'longitude' => 35.920000, 'is_available' => true],
            ['name' => 'Yousef Nasser', 'phone' => '0793333333', 'latitude' => 31.945000, 'longitude' => 35.895000, 'is_available' => true],
            ['name' => 'Khaled Omar', 'phone' => '0794444444', 'latitude' => 31.970000, 'longitude' => 35.930000, 'is_available' => false],
            ['name' => 'Mahmoud Ali', 'phone' => '0795555555', 'latitude' => 31.940000, 'longitude' => 35.880000, 'is_available' => true],
        ];

        foreach ($drivers as $driver) {
            Driver::query()->create($driver);
        }
    }
}
