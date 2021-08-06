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
Auth::routes();
Route::any('/signup', [App\Http\Controllers\AdminloginController::class, 'signup'])->name('signup');
Route::any('/adduser', [App\Http\Controllers\AdminloginController::class, 'store'])->name('adduser');
Route::any('/login', [App\Http\Controllers\AdminloginController::class, 'loginform'])->name('loginform');
Route::any('/loginuser', [App\Http\Controllers\AdminloginController::class, 'login'])->name('login');










Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::any('/logout', [App\Http\Controllers\AdminloginController::class, 'logout'])->name('logout');
