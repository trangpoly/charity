<?php

use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Client\Auth\AuthSessionController;
use App\Http\Controllers\Client\Auth\RegisterUserController;
use App\Http\Controllers\Client\ReceiverController;
use App\Http\Controllers\Admin\CategoryController;
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
});



