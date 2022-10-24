<?php

use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Category\CategoryController;
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

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('web.admin.dashboard');

    Route::prefix('product')->group(function () {
        Route::get('list', [ProductController::class, 'list'])->name('web.admin.product.list');
        Route::get('create', [ProductController::class, 'create'])->name('web.admin.product.create');
        Route::post('create', [ProductController::class, 'saveCreate'])->name('web.admin.product.saveCreate');
        Route::get('update/{id}', [ProductController::class, 'update'])->name('web.admin.product.update');
        Route::post('update/{id}', [ProductController::class, 'saveUpdate'])->name('web.admin.product.saveUpdate');
        Route::get('delete/{id}',[ProductController::class, 'delete'])->name('web.admin.product.delete');
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
});

Route::get('admin/user', [UserController::class, 'getUsers'])->name('web.admin.user.list');
Route::get('admin/user/create', [UserController::class, 'showCreateForm'])->name('web.admin.user.form');
Route::post('admin/user/create', [UserController::class, 'storeUser'])->name('web.admin.user.store');
Route::get('admin/user/edit/{id}', [UserController::class, 'showEditForm'])->name('web.admin.user.edit');
Route::post('admin/user/edit/{id}', [UserController::class, 'updateUser'])->name('web.admin.user.update');
Route::get('admin/user/deactivate/{id}', [UserController::class, 'deactivateUser'])->name('web.admin.user.deactivate');

Route::get('admin/order', [OrderController::class, 'getOrders'])->name('web.admin.order.list');
