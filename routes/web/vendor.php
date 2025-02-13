<?php
use App\Http\Controllers\CustomRegisterController;
use Illuminate\Support\Facades\Route;


Route::get('vendor_register', function(){
    return view('frontend.vendor');
});

Route::post('vendor_register',[CustomRegisterController::class, 'update_profile'])->name('vendor_register');
