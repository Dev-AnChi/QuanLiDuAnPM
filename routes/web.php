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



Route::get('/', static fn () => view('home'));
// Route::get('/', function(){
//    return view('home');
// });

Route::middleware(['auth', 'verified'])->group(function () {
   Route::get('/quaythuong', [packageController::class, 'index']);
   Route::get('/quaythuong/{id}', [packageController::class, 'show']);
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


Route::get('/voucher', [voucher_adminController::class, 'index']);
Route::get('voucher/create', [voucher_adminController::class, 'create']);
Route::post('voucher/store', [voucher_adminController::class, 'store']);
Route::get('voucher/show/{id}', [voucher_adminController::class, 'show']);
Route::get('voucher/edit/{id}', [voucher_adminController::class, 'edit']);
Route::put('voucher/update/{id}', [voucher_adminController::class, 'update']);
Route::delete('voucher/destroy/{id}', [voucher_adminController::class, 'destroy']);

Route::get('/user', [user_adminController::class, 'index']);
Route::get('user/create', [user_adminController::class, 'create']);
Route::post('user/store', [user_adminController::class, 'store']);
Route::get('user/show/{id}', [user_adminController::class, 'show']);
Route::get('user/edit/{id}', [user_adminController::class, 'edit']);
Route::put('user/update/{id}', [user_adminController::class, 'update']);
Route::delete('user/destroy/{id}', [user_adminController::class, 'destroy']);

Route::get('/package', [pakage_adminController::class, 'index']);
Route::get('package/create', [pakage_adminController::class, 'create']);
Route::post('package/store', [pakage_adminController::class, 'store']);
Route::get('package/show/{id}', [pakage_adminController::class, 'show']);
Route::get('package/edit/{id}', [pakage_adminController::class, 'edit']);
Route::put('package/update/{id}', [pakage_adminController::class, 'update']);
Route::delete('package/destroy/{id}', [pakage_adminController::class, 'destroy']);

Route::get('/miss', [miss_adminController::class, 'index']);
Route::get('miss/create', [miss_adminController::class, 'create']);
Route::post('miss/store', [miss_adminController::class, 'store']);
Route::get('miss/show/{id}', [miss_adminController::class, 'show']);
Route::get('miss/edit/{id}', [miss_adminController::class, 'edit']);
Route::put('miss/update/{id}', [miss_adminController::class, 'update']);
Route::delete('miss/destroy/{id}', [miss_adminController::class, 'destroy']);

require __DIR__.'/auth.php';
