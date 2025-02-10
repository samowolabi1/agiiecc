<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\AdvertController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RideController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Helpers\Routes\RouteHelper;

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

// Route::get('/s', function () {
//     return "hi";
// });

RouteHelper::includeRouteFiles(__DIR__ . '/web');





Route::get('/verification-email/{id}/{hash}', [AuthController::class, 'verify'])->name('verification.verify');

Route::get('/mail-testing', [PagesController::class, 'maily'])->name('mail.test');


Route::middleware(['auth', 'verified'])->group(function () {


    // Route::get('/admin_dashboard', [PagesController::class, 'admin_board'])->middleware(['role:admin'])->name('admin.index');
    // Route::get('/agent_dashboard', [PagesController::class, 'agent_board'])->middleware(['role:vendor'])->name('agent.index');
    // Route::get('/vendor_dashboard', [PagesController::class, 'vendor_board'])->middleware(['role:vendor'])->name('vendor.index');




    Route::get('/dashboard', [PagesController::class, 'user_redirect'])->name('dashboard');
    Route::get('/admin_dashboard', [PagesController::class, 'admin_board'])->name('admin.index');
    Route::get('/vendor_dashboard', [PagesController::class, 'vendor_board'])->name('vendor.index');
    Route::get('/user_dashboard', [PagesController::class, 'user_board'])->name('customer.index');

    //
    Route::get('/user-items', [ItemController::class, 'userItems'])->name('userItem');

    ////payment
    // Route::post('admin-', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');
    Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
    Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback'])->name('payment');

    //Sales
    Route::get('/my-sales', [SaleController::class, 'user_index'])->name('my.sales');

    //Adverts
    Route::get('/my-adverts', [AdvertController::class, 'user_ads'])->name('my.adverts');
    Route::get('/create-new-advert', [AdvertController::class, 'new_ad'])->name('new.advert');
    Route::get('/create-new-advert', [AdvertController::class, 'new_ads'])->name('new.advert');//not working
    Route::post('/save-new-advert', [AdvertController::class, 'store'])->name('store.advert');
    Route::get('/admin-show-advert/{id}', [AdvertController::class, 'show_ads'])->name('advert.show');

    ///Admin Adverts
    Route::get('admin-active-adverts', [AdvertController::class, 'active_ads'])->name('active.adverts');
    Route::get('admin-inactive-adverts', [AdvertController::class, 'inactive_ads'])->name('inactive.adverts');
    Route::get('admin-adverts-unapproved', [AdvertController::class, 'unapproved_active_ads'])->name('adverts.unapproved');
    Route::get('admin-payments-pending', [AdvertController::class, 'payment_pending'])->name('payments.pending');

    Route::get('/admin-approve-advert/{id}', [AdvertController::class, 'admin_approve_advert'])->name('admin.approve.advert');
    Route::get('/admin-status-advert/{id}', [AdvertController::class, 'admin_status_advert'])->name('admin.status.advert');



    //admin vendor
    Route::get('/admin-create-new-advert', [AdvertController::class, 'vend_new_ad'])->name('admin.new.advert');
    Route::post('/admin-save-new-advert', [AdvertController::class, 'admin_ven_cat'])->name('admin.store.advert');
    Route::post('admin-create-new-product', [ProductController::class, 'admin_store'])->name('admin.create.product');
    Route::post('admin-create-new-service', [ServiceController::class, 'admin_store'])->name('admin.create.service');
    Route::post('admin-create-new-ride', [RideController::class, 'admin_store'])->name('admin.create.ride');
    Route::post('admin-upload-images', [ImageController::class, 'admin_uploadImages'])->name('admin.upload.images');

    Route::get('/admin-vendor-items/{id}', [AdvertController::class, 'vend_items'])->name('vendor.items');

    //Admin vendor items
    Route::get('/admin-vendor-product-show/{id}', [ProductController::class, 'admin_product_show'])->name('admin.prod.show');
    Route::get('/admin-vendor-service-show/{id}', [ServiceController::class, 'admin_service_show'])->name('admin.serv.show');
    Route::get('/admin-vendor-ride-show/{id}', [RideController::class, 'admin_ride_show'])->name('admin.ride.show');

    //
    Route::get('/admin-approve-ride/{id}', [RideController::class, 'admin_approve_ride'])->name('admin.approve.ride');
    Route::get('/admin-status-ride/{id}', [RideController::class, 'admin_status_ride'])->name('admin.status.ride');
    Route::get('/admin-approve-service/{id}', [ServiceController::class, 'admin_approve_service'])->name('admin.approve.service');
    Route::get('/admin-status-service/{id}', [ServiceController::class, 'admin_status_service'])->name('admin.status.service');
    Route::get('/admin-approve-product/{id}', [ProductController::class, 'admin_approve_product'])->name('admin.approve.product');
    Route::get('/admin-status-product/{id}', [ProductController::class, 'admin_status_product'])->name('admin.status.product');


    ///Advert Order
    Route::get('admin-order-page/{id}', [AdvertController::class, 'order_page'])->name('admin.order.page');
    Route::post('admin-order-advert', [PaymentController::class, 'order_advert'])->name('admin.order.advert');


    //Company
    Route::post('create-my-company', [CompanyController::class, 'store'])->name('create.company');
    Route::post('update-my-company', [CompanyController::class, 'update'])->name('update.company');
    Route::post('create-vendor-company', [CompanyController::class, 'vencomp'])->name('create.company.admin');

    //AddCatego
    Route::post('create-advert-category', [AdvertController::class, 'store'])->name('create.addcat');

    //product
    Route::post('create-new-product', [ProductController::class, 'store'])->name('create.product');
    Route::get('/view-product/{slug}', [ProductController::class, 'adminprodview'])->name('product.show');
    Route::get('/admin-view-product/{id}', [ProductController::class, 'prodview'])->name('admin.product.show');
    Route::post('upload-images', [ImageController::class, 'uploadImages'])->name('upload.images');

    //service
    Route::post('create-new-service', [ServiceController::class, 'store'])->name('create.service');
    Route::post('upload-images', [ImageController::class, 'uploadImages'])->name('upload.images');

    //ride
    Route::post('create-new-ride', [RideController::class, 'store'])->name('create.ride');
    Route::post('upload-images', [ImageController::class, 'uploadImages'])->name('upload.images');

    //Employee
    Route::post('create-new-employee', [ProfileController::class, 'empstore'])->name('create.employee');
    Route::get('/view-employee/{id}', [ProfileController::class, 'empview'])->name('employee.show');

    //Vendor
    Route::post('create-new-vendor', [ProfileController::class, 'venstore'])->name('create.vendor');
    Route::get('/view-vendor/{id}', [ProfileController::class, 'venview'])->name('vendor.show');

    //Customer
    Route::post('create-new-customer', [ProfileController::class, 'cusstore'])->name('create.customer');
    Route::get('/view-customer/{id}', [ProfileController::class, 'cusview'])->name('customer.show');



    Route::get('/terms-and-conditions', [PagesController::class, 'terms'])->name('terms');

    Route::get('/admin-all-employees', [ProfileController::class, 'empindex'])->name('all.employees');
    Route::get('/admin-all-customers', [ProfileController::class, 'cusindex'])->name('all.customers');
    Route::get('/admin-all-vendors', [ProfileController::class, 'venindex'])->name('all.vendors');

    Route::get('/admin-all-products', [ProfileController::class, 'product_index'])->name('all.products');
    Route::get('/admin-all-services', [ProfileController::class, 'service_index'])->name('all.services');
    Route::get('/admin-all-rides', [ProfileController::class, 'ride_index'])->name('all.rides');

    Route::get('/my-profile', [ProfileController::class, 'userProfile'])->name('profile.index');
    Route::get('/update-profile', [ProfileController::class, 'updateProfile'])->name('profile.updateProfile');
    Route::get('/profile-edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile-update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/logout', [ProfileController::class, 'perform'])->name('logout.perform');
});

require __DIR__ . '/auth.php';
