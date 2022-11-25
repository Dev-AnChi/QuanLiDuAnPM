<?php

use App\Http\Controllers\packageController;
use App\Http\Controllers\voucherController;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MissController;
use App\Http\Controllers\voucher_adminController;
use App\Http\Controllers\user_adminController;
use App\Http\Controllers\miss_adminController;
use App\Http\Controllers\pakage_adminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', static fn () => view('home'))->name('trangchu');


Route::middleware(['auth', 'verified'])->group(function () {
   Route::get('/quaythuong', [packageController::class, 'index'])->name('quaythuong');
   Route::get('/quaythuong/{id}', [packageController::class, 'show'])->name('vaoquay');
});


Route::get('/dashboard', function () {
   return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



//verify email

Route::get('/email/verify', function () {
   return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
   $request->fulfill();

   return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
   $request->user()->sendEmailVerificationNotification();

   return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::middleware(['auth', 'verified','checkadmin'])->prefix('admin/voucher')->group(function (){
      Route::get('/', [voucher_adminController::class, 'index']);
      Route::get('/create', [voucher_adminController::class, 'create']);
      Route::post('/store', [voucher_adminController::class, 'store']);
      Route::get('/show/{id}', [voucher_adminController::class, 'show']);
      Route::get('/edit/{id}', [voucher_adminController::class, 'edit']);
      Route::put('/update/{id}', [voucher_adminController::class, 'update']);
      Route::delete('/destroy/{id}', [voucher_adminController::class, 'destroy']);
});

Route::middleware(['auth', 'verified','checkadmin'])->prefix('admin/user')->group(function (){
   Route::get('/', [user_adminController::class, 'index']);
   Route::get('/history', [user_adminController::class, 'history']);
   Route::get('/create', [user_adminController::class, 'create']);
   Route::post('/store', [user_adminController::class, 'store']);
   Route::get('/show/{id}', [user_adminController::class, 'show']);
   Route::get('/edit/{id}', [user_adminController::class, 'edit']);
   Route::put('/update/{id}', [user_adminController::class, 'update']);
   Route::delete('/destroy/{id}', [user_adminController::class, 'destroy']);

});

Route::middleware(['auth', 'verified','checkadmin'])->prefix('admin/package')->group(function (){
   Route::get('/', [pakage_adminController::class, 'index']);
   Route::get('/create', [pakage_adminController::class, 'create']);
   Route::post('/store', [pakage_adminController::class, 'store']);
   Route::get('/show/{id}', [pakage_adminController::class, 'show']);
   Route::get('/edit/{id}', [pakage_adminController::class, 'edit']);
   Route::put('/update/{id}', [pakage_adminController::class, 'update']);
   Route::delete('/destroy/{id}', [pakage_adminController::class, 'destroy']);
});

Route::middleware(['auth', 'verified','checkadmin'])->prefix('admin/miss')->group(function (){
   Route::get('/', [miss_adminController::class, 'index']);
   Route::get('/create', [miss_adminController::class, 'create']);
   Route::post('/store', [miss_adminController::class, 'store']);
   Route::get('/show/{id}', [miss_adminController::class, 'show']);
   Route::get('/edit/{id}', [miss_adminController::class, 'edit']);
   Route::put('/update/{id}', [miss_adminController::class, 'update']);
   Route::delete('/destroy/{id}', [miss_adminController::class, 'destroy']);
});





require __DIR__.'/auth.php';
