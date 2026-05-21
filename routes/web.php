<?php

use Illuminate\Support\Facades\Route;
use Presentation\Cpanel\Controllers\DashboardController;

Route::get('/', DashboardController::class);
