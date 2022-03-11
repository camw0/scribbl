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

Route::get('/dashboard/account', [App\Http\Controllers\Dashboard\AccountController::class, 'index'])->name('app.account');
Route::post('/dashboard/account/update/email', [App\Http\Controllers\Auth\UpdateController::class, 'updateEmail'])->name('app.account.update.email');

Route::get('/dashboard/create', [App\Http\Controllers\Dashboard\CreateController::class, 'index'])->name('app.create');
Route::post('/dashboard/create', [App\Http\Controllers\Dashboard\CreateController::class, 'create'])->name('app.create.post');

Route::get('/dashboard/view/{id}', [App\Http\Controllers\Dashboard\ViewController::class, 'index'])->name('app.view');
Route::get('/dashboard/view/error', [App\Http\Controllers\Dashboard\ViewController::class, 'index'])->name('app.unauthorised');

Route::post('/dashboard/delete/{id}', [App\Http\Controllers\Dashboard\DeleteController::class, 'index'])->name('app.delete');