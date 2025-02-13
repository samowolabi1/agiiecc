<?php

use App\Http\Controllers\CustomRegisterController;

use Illuminate\Support\Facades\Route;

Route::get('registeruser', [CustomRegisterController::class, 'registeruser'])->name('registeruser');
Route::post('registering', [CustomRegisterController::class, 'register'])->name('registeringuser');






