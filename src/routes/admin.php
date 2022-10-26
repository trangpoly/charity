<?php

use App\Http\Controllers\Admin\Account\AccountController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Slide\SlideController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('check.admin')->prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('web.admin.dashboard');

    Route::prefix('product')->group(function () {
        Route::get('list', [ProductController::class, 'list'])->name('web.admin.product.list');
        Route::get('create', [ProductController::class, 'create'])->name('web.admin.product.create');
        Route::post('create', [ProductController::class, 'saveCreate'])->name('web.admin.product.saveCreate');
        Route::get('update/{id}', [ProductController::class, 'update'])->name('web.admin.product.update');
        Route::post('update/{id}', [ProductController::class, 'saveUpdate'])->name('web.admin.product.saveUpdate');
        Route::get('delete/{id}',[ProductController::class, 'delete'])->name('web.admin.product.delete');
    });

    Route::prefix('account')->group(function () {
        Route::get('list', [AccountController::class, 'list'])->name('web.admin.account.list');
        Route::get('create', [AccountController::class, 'create'])->name('web.admin.account.create');
        Route::post('create', [AccountController::class, 'saveCreate'])->name('web.admin.account.saveCreate');
        Route::get('update/{id}', [AccountController::class, 'update'])->name('web.admin.account.update');
        Route::post('update/{id}', [AccountController::class, 'saveUpdate'])->name('web.admin.account.saveUpdate');
        Route::get('delete/{id}',[AccountController::class, 'delete'])->name('web.admin.account.delete');
    });

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'listCategory'])->name('web.admin.category.list');
        Route::get('add', [CategoryController::class, 'addCategory'])->name('web.admin.category.add');
        Route::post('add', [CategoryController::class, 'storeCategory'])->name('web.admin.category.store');

        Route::get('detail/{id}', [CategoryController::class, 'detailCategory'])->name('web.admin.category.detail');
        Route::post('detail/', [CategoryController::class, 'updateCategory'])->name('web.admin.category.update');

        Route::any('delete-subcate/{id}', [CategoryController::class, 'deleteSubCategory'])->name('web.admin.category.delete-subcate');

        Route::any('search', [CategoryController::class, 'searchCategory'])->name('web.admin.category.search');
        Route::post('pagination', [CategoryController::class, 'paginationCategory'])->name('web.admin.category.pagination');
    });

    Route::prefix('slide')->group(function () {
        Route::get('/', [SlideController::class, 'getSlideList'])->name('web.admin.slide.list');
        Route::post('active', [SlideController::class, 'activeSlide'])->name('web.admin.slide.active');
        Route::post('disable', [SlideController::class, 'disableSlide'])->name('web.admin.slide.disable');
        Route::get('create', [SlideController::class, 'createSlide'])->name('web.admin.slide.create');
        Route::post('create', [SlideController::class, 'storeSlide'])->name('web.admin.slide.store');
        Route::get('edit/{id}', [SlideController::class, 'editSlide'])->name('web.admin.slide.edit');
        Route::put('edit/{id}', [SlideController::class, 'updateSlide'])->name('web.admin.slide.update');
        Route::delete('delete', [SlideController::class, 'deleteSlide'])->name('web.admin.slide.delete');
    });
});

Route::get('admin/user', [UserController::class, 'getUsers'])->name('web.admin.user.list');
Route::get('admin/user/create', [UserController::class, 'showCreateForm'])->name('web.admin.user.form');
Route::post('admin/user/create', [UserController::class, 'storeUser'])->name('web.admin.user.store');
Route::get('admin/user/edit/{id}', [UserController::class, 'showEditForm'])->name('web.admin.user.edit');
Route::post('admin/user/edit/{id}', [UserController::class, 'updateUser'])->name('web.admin.user.update');
Route::get('admin/user/deactivate/{id}', [UserController::class, 'deactivateUser'])->name('web.admin.user.deactivate');

Route::get('admin/order', [OrderController::class, 'getOrders'])->name('web.admin.order.list');
Route::get('admin/order/edit/{id}', [OrderController::class, 'showEditForm'])->name('web.admin.order.edit');
Route::post('admin/order/edit/{id}', [OrderController::class, 'updateOrder'])->name('web.admin.order.update');
Route::get('admin/order/delete/{id}', [OrderController::class, 'deleteOrder'])->name('web.admin.order.delete');
