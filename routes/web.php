<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::group(['middleware' => 'web'], function () {
    Auth::routes();
});


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'web'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('login', [AdminController::class, 'showLoginForm'])->name('admin.login');
        Route::post('login', [AdminController::class, 'login']);
        Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
});

