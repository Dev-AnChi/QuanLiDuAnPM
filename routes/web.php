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
   Route::get('/lichsu',[UserController::class,'gethistory'])->name('lichsu');
   Route::get('/nhiemvu',[UserController::class,'getmiss'])->name('nhiemvu');
});


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


Route::middleware(['auth', 'verified','checkadmin'])->name('admin.')->prefix('admin')->group(function ()
{
   Route::get('/',[UserController::class,'dashboard'])->name('dashboard');
   Route::get('/report',[UserController::class,'report'])->name('report');
});



Route::middleware(['auth', 'verified','checkadmin'])->prefix('admin')->group(function (){

   Route::resource('voucher', voucher_adminController::class);
   Route::resource('user',user_adminController::class);
   Route::resource('package',pakage_adminController::class);
   Route::resource('miss',miss_adminController::class);

});


// Route::middleware(['auth', 'verified','checkadmin'])->prefix('admin')->group(function (){
//
// });





require __DIR__.'/auth.php';
