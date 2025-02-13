<?php

use App\Http\Controllers\RiderController;
use Illuminate\Support\Facades\Route;

Route::post('getprice', [RiderController::class, 'getprice'])->name('rider.getprice');
