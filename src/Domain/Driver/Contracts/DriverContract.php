<?php

namespace Domain\Driver\Contracts;

use Domain\Driver\Models\Entities\Driver;

interface DriverContract
{
    public function findById(int $id): ?Driver;

    public function findNearestAvailable(float $pickupLatitude, float $pickupLongitude): ?Driver;

    public function markUnavailable(int $driverId): void;
}
