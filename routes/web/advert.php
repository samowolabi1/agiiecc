<?php

use App\Http\Controllers\CreateAdvertController;
use Illuminate\Support\Facades\Route;

Route::get('/selectAds', [CreateAdvertController::class, 'selectAds'])->name('selectAds');
// Route::post('/selectAds', [CreateAdvertController::class, 'selectAds'])->name('selectAds');
Route::post('/createadsproduct', [CreateAdvertController::class, 'createadsproduct'])->name('createadsproduct');


