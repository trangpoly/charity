<?php

use App\Http\Controllers\Client\Auth\AuthController;
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

require __DIR__.'/auth.php';

route::name('charity.')->prefix('charity')->group(function () {

    Route::get('/register', [AuthController::class, 'showFormRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.auth');
    Route::get('register/verify', [AuthController::class, 'showFormOtpVerify'])->name('register.verify');
    Route::post('register/verify', [AuthController::class, 'checkOtp'])->name('register.verify.check-otp');
});
