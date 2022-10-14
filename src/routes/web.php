<?php

use App\Http\Controllers\Admin\Auth\AuthLoginController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Client\Auth\AuthSessionController;
use App\Http\Controllers\Client\Auth\RegisterUserController;
use App\Http\Controllers\Client\ReceiverController;
use App\Http\Controllers\Client\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Client\GiverController;
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

Route::get('/product/{id}', [ProductController::class, 'getProduct'])->name('web.client.product.detail');
Route::get('/category/{id}', [CategoryController::class, 'category'])->name('web.client.product.list');
Route::get('/sub-category/{id}', [ProductController::class, 'getProductsBySubCategory'])->name('web.client.product.list');

Route::post('/order/{product}', [OrderController::class, 'createOrder'])->name('web.order.create');
Route::post('/order/unsubscribe/{product}', [OrderController::class, 'unsubscribe'])->name('web.order.unsubscribe');

Route::get('/register', [RegisterUserController::class, 'showFormRegister'])->name('web.register');
Route::post('/register', [RegisterUserController::class, 'generateOTP'])->name('web.register.auth');
Route::get('/register/verify', [RegisterUserController::class, 'showFormOtpVerify'])->name('web.register.verify');
Route::post('/register/verify', [RegisterUserController::class, 'checkOTP'])->name('web.register.verify.check-otp');


Route::get('/login', [AuthSessionController::class, 'showFormLogin'])->name('web.login.show');
Route::post('/login', [AuthSessionController::class, 'generateOtp'])->name('web.login.auth');
Route::get('/login/otp-verify', [AuthSessionController::class, 'otpVerify'])->name('web.login.otp-verify');
Route::post('/login/otp-verify', [AuthSessionController::class, 'login'])->name('web.login.store');

Route::get('/logout', [AuthSessionController::class, 'logout'])->name('web.logout');

Route::get('/posts/create', [PostController::class, 'create'])->name('web.posts.create');
Route::get('/posts/create-form/{id}', [PostController::class, 'showPostForm'])->name('web.posts.create-form');
Route::post('/posts/create-form/{id}', [PostController::class, 'store'])->name('web.posts.store');
Route::get('/posts/edit/{id}/{subCategoryId}', [PostController::class, 'edit'])->name('web.posts.edit');
Route::post('/posts/remove-image', [PostController::class, 'deleteImageProduct'])->name('web.posts.remove-image');
Route::put('/posts/edit/{id}', [PostController::class, 'update'])->name('web.posts.update');

Route::prefix('giver')->group(function () {
    Route::get('subscribe-giver', [GiverController::class, 'showGiverPosts'])->name('web.client.giver-posts');
});

Route::prefix('receiver')->group(function () {
    Route::get('received', [ReceiverController::class, 'receivedList'])->name('web.client.received');
    Route::get('registered', [ReceiverController::class, 'registeredList'])->name('web.client.registered');
    Route::get('canceled', [ReceiverController::class, 'canceledList'])->name('web.client.canceled');
});

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('web.admin.dashboard');
    Route::get('categories', [CategoryController::class, 'list'])->name('web.admin.categories.list');

    Route::get('login', [AuthLoginController::class, 'create'])->name('web.admin.login.create');
    Route::post('login', [AuthLoginController::class, 'store'])->name('web.admin.login.store');
    Route::get('logout', [AuthLoginController::class, 'logout'])->name('web.admin.logout');
});
