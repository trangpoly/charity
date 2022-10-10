<?php

use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Client\Auth\AuthSessionController;
use App\Http\Controllers\Client\Auth\RegisterUserController;
use App\Http\Controllers\Client\ReceiverController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\CategoryController;
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

Route::get('/login', [AuthSessionController::class, 'showFormLogin'])->name('web.login.show');
Route::post('/login', [AuthSessionController::class, 'generateOtp'])->name('web.login.auth');
Route::get('/login/otp-verify', [AuthSessionController::class, 'otpVerify'])->name('web.login.otp-verify');
Route::post('/login/otp-verify', [AuthSessionController::class, 'login'])->name('web.login.store');

Route::get('/logout', [AuthSessionController::class, 'logout'])->name('web.logout');

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('web.admin.dashboard');
    Route::get('categories', [CategoryController::class, 'list'])->name('web.admin.categories.list');
});

Route::prefix('receiver')->group(function () {
    Route::get('receivedlist', [ReceiverController::class, 'receivedList'])->name('web.admin.receivedList');
    Route::get('registeredlist', [ReceiverController::class, 'registeredList'])->name('web.admin.registeredList');
    Route::get('canceledlist', [ReceiverController::class, 'canceledList'])->name('web.admin.canceledList');
});

Route::get('admin/user', [UserController::class, 'getUsers'])->name('web.admin.user.list');
Route::get('admin/user/create', [UserController::class, 'showCreateForm'])->name('web.admin.user.form');
Route::post('admin/user/create', [UserController::class, 'storeUsers'])->name('web.admin.user.store');
Route::get('admin/user/edit/{id}', [UserController::class, 'showEditForm'])->name('web.admin.user.edit');
Route::post('admin/user/edit/{id}', [UserController::class, 'updateUser'])->name('web.admin.user.update');
Route::delete('admin/user/delete/{id}', [UserController::class, 'deleteUser'])->name('web.admin.user.delete');

Route::prefix('giver')->group(function () {
    Route::get('subscribe-giver', function(){
        return view('pages.my-page.giver.subscribe-giver');
    })->name('web.client.giver.subscribe-giver');
});

