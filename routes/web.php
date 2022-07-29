<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Dashboard\HomeController as DashboardHomeController;

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

Route::middleware('auth')->group(function() {
    Route::get('/', [HomeController::class, "index"])->name('home');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('categories', CategoryController::class);

    Route::resource('transactions', TransactionController::class);

    Route::middleware('admin')->group(function() {
        Route::get('dashboard', [DashboardHomeController::class, 'index'])->name('dashboard.home');
    });
});


Route::middleware('guest')->as('auth.')->group(function() {
    Route::view('/login', "auth.login")->name('login');
    Route::get('/register', [AuthController::class, 'viewRegister'])->name('register');

    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});