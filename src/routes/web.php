<?php

use App\Http\Controllers\Admin\Auth\AuthLoginController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Client\Auth\AuthSessionController;
use App\Http\Controllers\Client\Auth\RegisterUserController;
use App\Http\Controllers\Client\ReceiverController;
use App\Http\Controllers\Client\PostController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\FavouriteController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Client\GiverController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Notification\NotificationController;
use App\Http\Controllers\User\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[ClientController::class, 'home'])->name('home');
Route::get('/contact', function () {
    return view('pages.contact');
})->name('web.client.contact');

Route::get('/contact',[ContactController::class, 'formContact'])->name('web.client.formContact');
Route::post('/contact',[ContactController::class, 'saveContact'])->name('web.client.saveContact');
Route::get('/about', function () {
    return view('pages.about');
})->name('web.client.about');

Route::get('/my-app', function () {
    return view('pages.my-page.subscribe-receive');
})->name('my-page.subscribe-receive');

Route::get('search',[ ProductController::class,'searchByNameAndSort'])->name("web.client.product.search");
Route::get('notify/{notify}',[ NotificationController::class,'getDetailNotify'])->name("web.client.notify.detail");
Route::any('notify/mark-as-read',[ NotificationController::class,'markAllNotifyAsRead'])->name("web.client.notify.markAsRead");

Route::get('/product/{id}', [ProductController::class, 'getProduct'])->name('web.client.product.detail')->middleware('auth');
Route::get('/category/{id}', [CategoryController::class, 'category'])->name('web.client.category.list');
Route::get('/sub-category/{id}', [ProductController::class, 'getProductsBySubCategory'])->name('web.client.subCategory.list');
Route::any('/search/{id}', [ProductController::class, 'submitSearch'])->name('web.client.product.submitSearch');
Route::any('/filter/{id}', [ProductController::class, 'filter'])->name('web.client.product.filter');
Route::any('/filterSearch/{id}', [ProductController::class, 'filterSearch'])->name('web.client.product.filterSearch');


Route::post('/add-favourite', [ProductController::class, 'addFavourite'])->name('web.client.product.add-favourite');
Route::post('/remove-favourite', [ProductController::class, 'removeFavourite'])->name('web.client.product.remove-favourite');

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
Route::get('/deactivate', [UserController::class, 'deactivateAccount'])->name('web.client.user.deactivate');

Route::get('/posts/create', [PostController::class, 'create'])->name('web.posts.create');
Route::get('/posts/create-form/{id}', [PostController::class, 'showPostForm'])->name('web.posts.create-form');
Route::post('/posts/create-form', [PostController::class, 'store'])->name('web.posts.store');
Route::get('/posts/edit/{id}/{subCategoryId}', [PostController::class, 'edit'])->name('web.posts.edit');
Route::post('/posts/remove-image', [PostController::class, 'deleteImageProduct'])->name('web.posts.remove-image');
Route::post('/posts/edit/{id}', [PostController::class, 'update'])->name('web.posts.update');
Route::get('/posts/duplicate/{product}', [PostController::class, 'showDuplicateForm'])->name('web.client.duplicate.form');
Route::post('/posts/duplicate/{product}', [PostController::class, 'storeDuplicate'])->name('web.client.duplicate.store');

Route::prefix('giver')->group(function () {
    Route::get('subscribe-giver', [GiverController::class, 'showGiverPostsRegistered'])->name('web.client.giver-posts');
    Route::get('not-subscribe-giver', [GiverController::class, 'showGiverPostsNotRegistered'])->name('web.client.giver-posts.not-registered');
    Route::post('mark-soldout/{id}', [GiverController::class, 'markSoldOut'])->name('web.client.giver-posts.mark-soldout');
    Route::get('marked-soldout', [GiverController::class, 'showGiverPostsMarkedSoldOut'])->name('web.client.giver-posts.marked-soldout');
    Route::get('gived', [GiverController::class, 'showGiverPostsGived'])->name('web.client.giver-posts.gived');
});

Route::prefix('receiver')->group(function () {
    Route::get('registered', [ReceiverController::class, 'registeredList'])->name('web.client.registered');
    Route::post('registered/undo', [ReceiverController::class, 'undoRegisted'])->name('web.client.undo-registered');
    Route::post('registered/confirm-received', [ReceiverController::class, 'confirmReceived'])->name('web.client.confirm-received');
    Route::get('received', [ReceiverController::class, 'receivedList'])->name('web.client.received');
    Route::get('canceled', [ReceiverController::class, 'canceledList'])->name('web.client.canceled');
    Route::post('registered/re', [ReceiverController::class, 'reRegistered'])->name('web.client.re-registered');
});

Route::prefix('favourite')->group(function () {
    Route::get('list', [FavouriteController::class, 'list'])->name('web.client.favourite-list');
});

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('web.admin.dashboard');
    Route::get('categories', [CategoryController::class, 'list'])->name('web.admin.categories.list');

    Route::get('login', [AuthLoginController::class, 'create'])->name('web.admin.login.create');
    Route::post('login', [AuthLoginController::class, 'store'])->name('web.admin.login.store');
    Route::get('logout', [AuthLoginController::class, 'logout'])->name('web.admin.logout');

    Route::get('banner', [BannerController::class, 'setting'])->name('web.admin.banner.setting');
    Route::post('banner', [BannerController::class, 'uploadBanner'])->name('web.admin.banner.upload');
});
