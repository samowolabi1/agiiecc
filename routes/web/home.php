<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('home.index');
Route::get('about', [FrontendController::class, 'about'])->name('home.about');
Route::get('category', [FrontendController::class, 'category'])->name('home.category');
Route::get('/', [FrontendController::class, 'index'])->name('home.index');
Route::get('/', [FrontendController::class, 'index'])->name('home.index');


