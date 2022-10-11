<?php

use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Client\Auth\AuthSessionController;
use App\Http\Controllers\Client\Auth\RegisterUserController;
use App\Http\Controllers\Client\ReceiverController;
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

Route::get('/home', function () {
    return view('pages.home');
})->name('home');

Route::get('/product/{id}', [ProductController::class, 'getProduct'])->name('web.client.product.detail');

Route::get('/register', [RegisterUserController::class, 'showFormRegister'])->name('web.register');
Route::post('/register', [RegisterUserController::class, 'generateOTP'])->name('web.register.auth');
Route::get('/register/verify', [RegisterUserController::class, 'showFormOtpVerify'])->name('web.register.verify');
Route::post('/register/verify', [RegisterUserController::class, 'checkOTP'])->name('web.register.verify.check-otp');


Route::get('/login', [AuthSessionController::class, 'showFormLogin'])->name('web.login.show');
Route::post('/login', [AuthSessionController::class, 'generateOtp'])->name('web.login.auth');
Route::get('/login/otp-verify', [AuthSessionController::class, 'otpVerify'])->name('web.login.otp-verify');
Route::post('/login/otp-verify', [AuthSessionController::class, 'login'])->name('web.login.store');

Route::get('/logout', [AuthSessionController::class, 'logout'])->name('web.logout');

Route::prefix('giver')->group(function () {
    Route::get('subscribe-giver', function () {

        return view('pages.my-page.giver.subscribe-giver');
    })->name('web.client.giver.subscribe-giver');
});

Route::prefix('receiver')->group(function () {
    Route::get('received', [ReceiverController::class, 'receivedList'])->name('web.client.received');
    Route::get('registered', [ReceiverController::class, 'registeredList'])->name('web.client.registered');
    Route::get('canceled', [ReceiverController::class, 'canceledList'])->name('web.client.canceled');
});
