<?php

use App\Http\Controllers\AhrefsController;
use App\Http\Controllers\HealthCheckController;
use Illuminate\Support\Facades\Route;

Route::get('/healthcheck', HealthCheckController::class);
Route::get('/', AhrefsController::class);
