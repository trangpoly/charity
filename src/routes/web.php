<?php

use App\Http\Controllers\Client\Auth\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/my-app', function () {
    return view('pages.my-page.subscribe-receive');
})->middleware(['auth'])->name('my-page.subscribe-receive');

require __DIR__.'/auth.php';


route::name('charity.')->prefix('charity')->group(function () {

    Route::get('/register', [AuthController::class, 'showFormRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'generateOtp'])->name('register.auth');
    Route::get('register/verify', [AuthController::class, 'showFormOtpVerify'])->name('register.verify');
    Route::post('register/verify', [AuthController::class, 'checkOtp'])->name('register.verify.check-otp');
});

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('web.admin.dashboard');
});
