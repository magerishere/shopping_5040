<?php

use App\Http\Controllers\Back\AuthController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.show');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::get('/', [DashboardController::class, 'showDashboard'])->name('dashboard.show')->middleware('auth');
Route::resource('products', ProductController::class);


