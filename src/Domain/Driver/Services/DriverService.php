<?php

namespace Domain\Driver\Services;

use Domain\Driver\Contracts\DriverContract;
use Domain\Driver\Models\Entities\Driver;

class DriverService implements DriverContract
{
    private const SEARCH_RADIUS_KM = 50;

    public function findById(int $id): ?Driver
    {
        return Driver::query()->find($id);
    }

    public function findNearestAvailable(float $pickupLatitude, float $pickupLongitude): ?Driver
    {
        $latDelta = self::SEARCH_RADIUS_KM / 111;
        $lngDelta = self::SEARCH_RADIUS_KM / (111 * cos(deg2rad($pickupLatitude)));

        return Driver::query()
            ->where('is_available', true)
            ->whereNotIn('id', function ($query) {
                $query->select('driver_id')
                    ->from('orders')
                    ->whereIn('status', ['assigned', 'in_transit'])
                    ->whereNotNull('driver_id');
            })
            ->whereBetween('latitude', [$pickupLatitude - $latDelta, $pickupLatitude + $latDelta])
            ->whereBetween('longitude', [$pickupLongitude - $lngDelta, $pickupLongitude + $lngDelta])
            ->select('drivers.*')
            ->selectRaw(
                '(6371 * acos(least(1.0, greatest(-1.0,
                    cos(radians(?)) * cos(radians(latitude)) *
                    cos(radians(longitude) - radians(?)) +
                    sin(radians(?)) * sin(radians(latitude))
                )))) AS distance',
                [$pickupLatitude, $pickupLongitude, $pickupLatitude]
            )
            ->orderBy('distance')
            ->first();
    }

    public function markUnavailable(int $driverId): void
    {
        Driver::query()
            ->whereKey($driverId)
            ->update(['is_available' => false]);
    }
}
