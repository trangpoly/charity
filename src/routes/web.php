<?php

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
})->middleware(['auth'])->name('home');

Route::get('/my-app', function () {
    return view('pages.my-page.subscribe-receive');
})->middleware(['auth'])->name('my-page.subscribe-receive');

require __DIR__.'/auth.php';
