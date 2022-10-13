<?php

use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
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
    Route::get('categories', [CategoryController::class, 'list'])->name('web.admin.categories.list');

    Route::prefix('product')->group(function () {
        Route::get('list', [ProductController::class, 'list'])->name('web.admin.list');
        Route::get('create', [ProductController::class, 'create'])->name('web.admin.create');
        Route::post('create', [ProductController::class, 'savaCreate'])->name('web.admin.saveCreate');
        Route::get('update', [ProductController::class, 'create'])->name('web.admin.create');
        Route::post('update', [ProductController::class, 'savaUpdate'])->name('web.admin.saveUpdate');
    });

    Route::prefix('categories')->group(function(){
        Route::get('/', [CategoryController::class, 'list'])->name('web.admin.categories.list');
        Route::get('/create', [CategoryController::class, 'create'])->name('web.admin.categories.form-create');
    });
});

Route::get('admin/user', [UserController::class, 'getUsers'])->name('web.admin.user.list');
Route::get('admin/user/create', [UserController::class, 'showCreateForm'])->name('web.admin.user.form');
Route::post('admin/user/create', [UserController::class, 'storeUser'])->name('web.admin.user.store');
Route::get('admin/user/edit/{id}', [UserController::class, 'showEditForm'])->name('web.admin.user.edit');
Route::post('admin/user/edit/{id}', [UserController::class, 'updateUser'])->name('web.admin.user.update');
Route::delete('admin/user/delete/{id}', [UserController::class, 'deleteUser'])->name('web.admin.user.delete');




