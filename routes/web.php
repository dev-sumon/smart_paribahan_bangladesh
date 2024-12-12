<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\StandController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Auth\AdminLoginController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(AdminLoginController::class)->prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', 'adminLogin')->name('login');
    Route::post('/login', 'adminLoginCheck')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::controller(AdminController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::put('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });

    Route::controller(StandController::class)->prefix('stand')->name('stand.')->group(function(){
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('update/{id}', 'update')->name('update');
        Route::post('update/{id}', 'update_store')->name('update');
        Route::get('status/{id}', 'status')->name('status.update');
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::get('detalis/{id}', 'detalis')->name('detalis');
    });
});
