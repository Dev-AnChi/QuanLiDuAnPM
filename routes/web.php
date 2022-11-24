<?php

use App\Http\Controllers\packageController;
use App\Http\Controllers\voucherController;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
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


require __DIR__.'/auth.php';
