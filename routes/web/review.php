<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;

Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])->name('reviews.store')->middleware('auth');
