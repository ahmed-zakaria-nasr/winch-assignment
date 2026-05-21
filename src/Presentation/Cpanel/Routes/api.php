<?php

use Illuminate\Support\Facades\Route;
use Presentation\Cpanel\Controllers\DriverOrderController;
use Presentation\Cpanel\Controllers\OrderAssignmentController;

Route::prefix('api')->group(function () {
    Route::post('orders/{id}/assign', [OrderAssignmentController::class, 'assign']);
    Route::get('drivers/{id}/orders', [DriverOrderController::class, 'index']);
});
