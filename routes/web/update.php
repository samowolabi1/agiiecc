<?php

use App\Http\Controllers\UpdateAdvertController;
use Illuminate\Support\Facades\Route;


//product Ads

Route::put('/products/{id}', [UpdateAdvertController::class, 'update'])->name('products.update');
Route::put('/rides/{id}', [UpdateAdvertController::class, 'storeOrUpdate'])->name('storeOrUpdate');


// Route::put('/updateService/{id}', [UpdateAdvertController::class, 'updateService'])->name('updateService');

Route::post('/updateService/{id}', [UpdateAdvertController::class, 'updateService'])->name('updateService');

