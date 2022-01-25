<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::prefix('admin')->name('admin')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('.dashboard');
    Route::prefix('users')->name('.users')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('.all');
        Route::get('/{id}', [UserController::class, 'show'])->name('.show');
        Route::get('/{id}/approve', [UserController::class, 'approve'])->name('.approve');
    });
});
