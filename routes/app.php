<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Dashboard\AccountController;
use App\Http\Controllers\Dashboard\DashboardController;

use App\Http\Controllers\Dashboard\Scribbl\ViewController;
use App\Http\Controllers\Dashboard\Scribbl\ScribblController;

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

Route::get('/', [IndexController::class, 'index'])->name('index');

Auth::routes();

Route::prefix('dashboard')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('app.dashboard');

    Route::prefix('account')->group(function () {
        Route::get('/', [AccountController::class, 'index'])->name('app.account');
        Route::post('/email', [AccountController::class, 'updateEmail'])->name('app.account.email');
        Route::post('/delete', [AccountController::class, 'delete'])->name('app.account.delete');
    });

    Route::prefix('create')->group(function () {
        Route::get('/', [ViewController::class, 'create'])->name('app.create');
        Route::post('/', [ScribblController::class, 'create'])->name('app.create');
    });

    Route::prefix('view')->group(function () {
        Route::get('/{id}', [ViewController::class, 'view'])->name('app.view');
        Route::get('/error', [ViewController::class, 'view'])->name('app.unauthorised');
    });

    Route::prefix('info')->group(function () {
        Route::get('/{id}', [ViewController::class, 'info'])->name('app.info');
    });

    Route::prefix('edit')->group(function () {
        Route::get('/{id}', [ViewController::class, 'edit'])->name('app.edit');
        Route::post('/{id}', [ScribblController::class, 'edit'])->name('app.edit.new');
    });

    Route::prefix('delete')->group(function () {
        Route::post('/{id}', [ScribblController::class, 'delete'])->name('app.delete');
    });
});