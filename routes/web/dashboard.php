<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::post('/update-profile-picture', [DashboardController::class, 'updateProfilePicture'])->middleware('auth');
Route::post('/additional_info', [DashboardController::class, 'additional_info'])->middleware('auth');


