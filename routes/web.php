<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\ViewController;
use App\Http\Controllers\Dashboard\DeleteController;
use App\Http\Controllers\Dashboard\CreateController;
use App\Http\Controllers\Dashboard\AccountController;
use App\Http\Controllers\Dashboard\DashboardController;

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

Route::get('/', [HomeController::class, 'index'])->name('index');

Auth::routes();

Route::prefix('dashboard')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('app.dashboard');

    Route::prefix('account')->group(function () {
        Route::get('/', [AccountController::class, 'index'])->name('app.account');
        Route::post('/email', [AccountController::class, 'updateEmail'])->name('app.account.email');
    });

    Route::prefix('create')->group(function () {
        Route::get('/create', [CreateController::class, 'index'])->name('app.create');
    });

    Route::prefix('view')->group(function () {
        Route::get('/{id}', [ViewController::class, 'index'])->name('app.view');
        Route::get('/error', [ViewController::class, 'index'])->name('app.unauthorised');
    });

    Route::prefix('delete')->group(function () {
        Route::post('/{id}', [DeleteController::class, 'index'])->name('app.delete');
    });
});