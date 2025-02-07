<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('home.index');
Route::get('about', [FrontendController::class, 'about'])->name('home.about');
Route::get('category', [FrontendController::class, 'category'])->name('home.category');

Route::get('ride', [FrontendController::class, 'ride'])->name('home.ride');
Route::get('service', [FrontendController::class, 'service'])->name('home.service');

Route::get('contact', [FrontendController::class, 'contact'])->name('home.contact');
// Route::get('product/{id}', [FrontendController::class, 'product'])->name('home.product');


Route::get('product/{product}', [FrontendController::class, 'product'])->name('home.product');






