<?php

namespace Domain\Driver\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'drivers';

    protected $fillable = [
        'name',
        'phone',
        'latitude',
        'longitude',
        'is_available',
    ];

    protected function casts(): array
    {
        return [
            'latitude' => 'float',
            'longitude' => 'float',
            'is_available' => 'boolean',
        ];
    }
}
