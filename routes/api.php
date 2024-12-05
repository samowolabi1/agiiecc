<?php

use Illuminate\Http\Request;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ImpendController;
use App\Http\Controllers\LostController;
use App\Http\Controllers\PensionerController;
use App\Http\Controllers\PoliceController;
use App\Http\Controllers\ReturnpassController;
use App\Models\Returnpass;
use App\Models\Sibling;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/email/verification-notification', [AuthController::class, 'sendVerificationEmail'])->middleware('auth:sanctum');
Route::get('/verify-email/{id}/{hash}', [AuthController::class, 'verify'])->name('verification.verify')->middleware('signed');

    


Route::group(['middleware' => ['auth:sanctum','verified']], function() {

    // Route::get('/email/verify/{id}',[AuthController::class, 'verify'])->name('verification.verify'); 

// Route::get('/email/resend',[AuthController::class, 'resend'])->name('verification.resend');
    

    Route::post('/user/update/{id}', [AuthController::class, 'update']);
    Route::get('/user/edit/{id}', [AuthController::class, 'edit']);
    Route::get('/user/show/{id}', [AuthController::class, 'show']);
    Route::post('/user/logout', [AuthController::class, 'logout']);

    Route::get('/payment/transactions', [PaymentController::class, 'index'])->name('payment.index');
    Route::post('/payment/new-payment', [PaymentController::class, 'pay'])->name('payment.pay');
    

    Route::get('/links', [LinkController::class, 'index']);
    Route::post('/link/create', [LinkController::class, 'store']);
    Route::get('/link/show/{id}', [LinkController::class, 'show']);
    Route::put('/link/edit/{id}', [LinkController::class, 'update']);
    Route::get('/link/delete/{id}', [LinkController::class, 'destroy']);


        //Admin
    Route::get('/admin-dashboard', [PagesController::class, 'index']);
    Route::get('/admin-dashboard/all-students', [PagesController::class, 'student']);
    Route::get('/admin-dashboard/all-police-clearance', [PagesController::class, 'police']);
    Route::get('/admin-dashboard/all-non-impendiment', [PagesController::class, 'impend']);
    Route::get('/admin-dashboard/all-pension-attestation', [PagesController::class, 'attest']);
    Route::get('/admin-dashboard/all-emergency-travel', [PagesController::class, 'emergency']);


    Route::get('/forms', [FormController::class, 'index']);
    Route::post('/form/create', [FormController::class, 'store']);
    Route::get('/form/{id}', [FormController::class, 'show']);
    Route::put('/form/edit/{id}', [FormController::class, 'update']);
    Route::get('/form/delete/{id}', [FormController::class, 'destroy']);

    Route::get('/files', [FileController::class, 'index']);
    Route::post('/file/create', [FileController::class, 'store']);
    Route::get('/file/show/{id}', [FileController::class, 'show']);


    Route::get('/citizens', [CitizenController::class, 'index']);
    Route::post('/citizen/create', [CitizenController::class, 'store']);
    Route::get('/citizen/show/{id}', [CitizenController::class, 'show']);

    Route::get('/documentation', [DocumentationController::class, 'index']);
    Route::post('/documentation/create', [DocumentationController::class, 'store']);
    Route::get('/documentation/{id}', [DocumentationController::class, 'show']);


    Route::get('/emegencies', [EmergencyController::class, 'index']);
    Route::post('/emegency/create', [EmergencyController::class, 'store']);
    Route::get('/emegency/show/{id}', [EmergencyController::class, 'show']);


    Route::get('/files', [FileController::class, 'index']);
    Route::post('/file/create', [FileController::class, 'store']);

     Route::post('/student/file/create', [FileController::class, 'stustore']);
     Route::post('/police-clearance/file/create', [FileController::class, 'postore']);
     Route::post('/non-impendiment/file/create', [FileController::class, 'impendstore']);
     Route::post('/attestation/file/create', [FileController::class, 'ateststore']);

    Route::get('/file/show/{id}', [FileController::class, 'show']);

    //Payment Edit
    Route::get('/payment/all-payments', [PaymentController::class, 'index']);
    Route::post('/payment/make-payment', [PaymentController::class, 'paying']);
    Route::get('/payment/make-other-payment', [PaymentController::class, 'otherpay']);
    Route::post('/payment/investor/pay', [PaymentController::class, 'store']);
    Route::get('/payment/payment/show/{id}', [PaymentController::class, 'show']);

        // fggggggggg
        Route::get('/siblings', [SiblingController::class, 'index']);
        Route::post('/sibling/create', [SiblingController::class, 'store']);
        Route::get('/sibling/show/{id}', [SiblingController::class, 'show']);


    

    Route::get('/impediments', [ImpendController::class, 'index']);
    Route::post('/impediment/create', [ImpendController::class, 'store']);
    Route::get('/impediment/show/{id}', [ImpendController::class, 'show']);


    Route::get('/losts', [LostController::class, 'index']);
    Route::post('/lost/create', [LostController::class, 'store']);
    Route::get('/lost/show/{id}', [LostController::class, 'show']);


    Route::get('/return-passports', [ReturnpassController::class, 'index']);
    Route::post('/return-passport/create', [ReturnpassController::class, 'store']);
    Route::get('/return-passport/show/{id}', [ReturnpassController::class, 'show']);


    // Route::get('/notices', [NoticeController::class, 'index']);
    // Route::post('/notice/create', [NoticeController::class, 'store']);
    // Route::get('/notice/{id}', [NoticeController::class, 'show']);

    Route::get('/pensioners', [PensionerController::class, 'index']);
    Route::post('/pensioner/create', [PensionerController::class, 'store']);
    Route::get('/pensioner/show/{id}', [PensionerController::class, 'show']);


    Route::get('/citizens', [CitizenController::class, 'index']);
    Route::post('/citizen/create', [CitizenController::class, 'store']);
    Route::get('/citizen/show/{id}', [CitizenController::class, 'show']);


    Route::get('/polices', [PoliceController::class, 'index']);
    Route::post('/police/create', [PoliceController::class, 'store']);
    Route::get('/police/show/{id}', [PoliceController::class, 'show']);

    
    Route::get('/notices', [NoticeController::class, 'index']);
    Route::post('/notice/create', [NoticeController::class, 'store']);
    Route::get('/notice/show/{id}', [NoticeController::class, 'show']);
    Route::put('/notice/edit/{id}', [NoticeController::class, 'update']);
    Route::get('/notice/delete/{id}', [NoticeController::class, 'destroy']);

    Route::get('/payment-items', [ProductController::class, 'index']);
    Route::post('/payment-item/create', [ProductController::class, 'store']);
    Route::get('/payment-item/{id}', [ProductController::class, 'show']);
    Route::put('/payment-item/edit/{id}', [ProductController::class, 'update']);
    Route::get('/payment-item/delete/{id}', [ProductController::class, 'destroy']);


    Route::get('/students', [StudentController::class, 'index']);
    Route::post('/student/create', [StudentController::class, 'store']);
    Route::get('/student/show/{id}', [StudentController::class, 'show']);
    Route::put('/student/edit/{id}', [StudentController::class, 'update']);
    Route::get('/student/delete/{id}', [StudentController::class, 'destroy']);



    Route::get('/files', [FileController::class, 'store']);
    Route::post('/file/create', [FileController::class, 'store']);
    Route::get('/file/show/{id}', [FileController::class, 'show']);



    // Route::get('/polices', [PoliceController::class, 'index']);
    // Route::post('/police/create', [PoliceController::class, 'store']);
    // Route::get('/police/{id}', [PoliceController::class, 'show']);
    // Route::put('/police/edit/{id}', [PoliceController::class, 'update']);
    // Route::get('/police/delete/{id}', [PoliceController::class, 'destroy']);


    Route::get('/staffs', [StaffController::class, 'index']);
    Route::post('/staff/create', [StaffController::class, 'store']);
    Route::get('/staff/show/{id}', [StaffController::class, 'show']);
    Route::put('/staff/edit/{id}', [StaffController::class, 'update']);
    Route::get('/staff/delete/{id}', [StaffController::class, 'destroy']);
    

    Route::get('/departments', [DepartmentController::class, 'index']);
    Route::post('/department/create', [DepartmentController::class, 'store']);
    Route::get('/department/show/{id}', [DepartmentController::class, 'show']);
    Route::put('/department/edit/{id}', [DepartmentController::class, 'update']);
    Route::get('/department/delete/{id}', [DepartmentController::class, 'destroy']);

    Route::get('/students', [StudentController::class, 'index']);
    Route::post('/student/create', [StudentController::class, 'store']);
    Route::get('/student/show/{id}', [StudentController::class, 'show']);
    Route::put('/student/edit/{id}', [StudentController::class, 'update']);
    Route::get('/student/delete/{id}', [StudentController::class, 'destroy']);
    
});


