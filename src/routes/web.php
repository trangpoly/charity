<?php

use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Client\ClientController;
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

Route::get('/my-app', function () {
    return view('pages.my-page.subscribe-receive');
})->name('my-page.subscribe-receive');

Route::get('/product/{id}', [ProductController::class, 'getProduct'] )->middleware(['auth'])->name('web.client.product.detail');

require __DIR__.'/auth.php';


Route::get('/register', [RegisterUserController::class, 'showFormRegister'])->name('web.register');
Route::post('/register', [RegisterUserController::class, 'generateOTP'])->name('web.register.auth');
Route::get('/register/verify', [RegisterUserController::class, 'showFormOtpVerify'])->name('web.register.verify');
Route::post('/register/verify', [RegisterUserController::class, 'checkOTP'])->name('web.register.verify.check-otp');

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('web.admin.dashboard');

    Route::get('categories', [CategoryController::class, 'list'])->name('web.admin.categories.list');
});

Route::prefix('receiver')->group(function () {
    Route::get('receivedlist', [ReceiverController::class, 'receivedList'])->name('web.admin.receivedList');
    Route::get('registeredlist', [ReceiverController::class, 'registeredList'])->name('web.admin.registeredList');
    Route::get('canceledlist', [ReceiverController::class, 'canceledList'])->name('web.admin.canceledList');
});

Route::prefix('giver')->group(function () {
    Route::get('subscribe-giver', function(){
        return view('pages.my-page.giver.subscribe-giver');
    })->name('web.client.giver.subscribe-giver');
});

Route::prefix('receiver')->group(function () {
    Route::get('received', [ReceiverController::class, 'receivedList'])->name('web.admin.receivedList');
    Route::get('registered', [ReceiverController::class, 'registeredList'])->name('web.admin.registeredList');
    Route::get('canceled', [ReceiverController::class, 'canceledList'])->name('web.admin.canceledList');
});
