<?php

use App\Http\Controllers\CreateAdvertController;
use App\Http\Controllers\CreateAdvertServiceController;
use App\Http\Controllers\CreateRideController;
use Illuminate\Support\Facades\Route;


//product Ads

Route::get('/selectAds', [CreateAdvertController::class, 'selectAds'])->name('selectAds');
Route::get('/view_product_ads/{id}', [CreateAdvertController::class, 'view_product_ads'])->name('view_product_ads');
Route::post('/createadsproduct', [CreateAdvertController::class, 'createadsproduct'])->name('createadsproduct');
Route::post('/product_uploadImages', [CreateAdvertController::class, 'product_uploadImages'])->name('product_uploadImages');

Route::get('/adverts/vendoradvertuploadimage', [CreateAdvertController::class, 'vendorAdvertUploadImage'])->name('vendoradvertuploadimage');

Route::get('/show_single_ads/{id}', [CreateAdvertController::class, 'show_single_ads'])->name('show_single_ads');
Route::get('/show_single_ads_service/{id}', [CreateAdvertController::class, 'show_single_ads_service'])->name('show_single_ads_service');
Route::get('/show_single_ads_ride/{id}', [CreateAdvertController::class, 'show_single_ads_ride'])->name('show_single_ads_ride');

Route::post('create_rider_store', [CreateRideController::class, 'create_rider_store'])->name('create_rider_store');


//Service Ads
Route::post('/vendor_create_service', [CreateAdvertServiceController::class, 'vendor_create_service'])->name('vendor_create_service');
Route::post('/ride_uploadImages', [CreateAdvertServiceController::class, 'ride_uploadImages'])->name('ride_uploadImages');




