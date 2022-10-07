<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\Auth\RegisterUserController;
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

Route::get('/my-app', function () {
    return view('pages.my-page.subscribe-receive');
})->name('my-page.subscribe-receive');

require __DIR__.'/auth.php';

Route::get('/register', [RegisterUserController::class, 'showFormRegister'])->name('web.register');
Route::post('/register', [RegisterUserController::class, 'generateOTP'])->name('web.register.auth');
Route::get('/register/verify', [RegisterUserController::class, 'showFormOtpVerify'])->name('web.register.verify');
Route::post('/register/verify', [RegisterUserController::class, 'checkOTP'])->name('web.register.verify.check-otp');

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('web.admin.dashboard');
});

Route::prefix('receiver')->group(function () {
    Route::get('receivedlist', [ClientController::class, 'received_list'])->name('web.admin.receivedList');
    Route::get('registeredlist', [ClientController::class, 'registered_list'])->name('web.admin.registeredList');
    Route::get('canceledlist', [ClientController::class, 'canceled_list'])->name('web.admin.canceledList');
});
