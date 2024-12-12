<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\AdvertController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');

// })->middleware(['auth'])->name('dashboard');

// Route::get('/admin', function () {
//     return view('admin.index');
// })->middleware(['auth', 'role:admin'])->name('admin.index');
Route::get('/verification-email/{id}/{hash}', [AuthController::class, 'verify'])->name('verification.verify');

Route::get('/mail-testing', [PagesController::class, 'maily'])->name('mail.test');



Route::middleware(['auth','verified'])->group(function () {

    Route::get('/admin_dashboard', [PagesController::class, 'admin_board'])->middleware(['auth', 'role:admin'])->name('admin.index');
    Route::get('/agent_dashboard', [PagesController::class, 'agent_board'])->middleware(['auth', 'role:agent'])->name('agent.index');
    Route::get('/dashboard', [PagesController::class, 'user_board'])->middleware(['auth'])->name('dashboard');

    //
    Route::get('/user-items', [ItemController::class, 'userItems'])->name('userItem');

    //Sales
    Route::get('/my-sales', [SaleController::class, 'user_index'])->name('my.sales');

    //Adverts
    Route::get('/my-adverts', [AdvertController::class, 'user_ads'])->name('my.adverts');
     Route::get('/create-new-advert', [AdvertController::class, 'new_ad'])->name('new.advert');
      Route::post('/save-new-advert', [AdvertController::class, 'store'])->name('store.advert');

    //Company
    Route::post('create-my-company', [CompanyController::class, 'store'])->name('create.company');
    


    Route::get('/terms-and-conditions', [PagesController::class, 'terms'])->name('terms');

    Route::get('/my-profile', [ProfileController::class, 'userProfile'])->name('profile.index');
    Route::get('/profile-edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile-update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/logout', [ProfileController::class, 'perform'])->name('logout.perform');
});

require __DIR__.'/auth.php';
