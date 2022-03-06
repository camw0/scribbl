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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('app.dashboard');

Route::get('/account', [App\Http\Controllers\Dashboard\AccountController::class, 'index'])->name('app.account');

Route::get('/create', [App\Http\Controllers\Dashboard\CreateController::class, 'index'])->name('app.create');
Route::post('/create', [App\Http\Controllers\Dashboard\CreateController::class, 'create'])->name('app.create.post');

