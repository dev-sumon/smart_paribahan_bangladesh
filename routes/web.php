<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminLoginController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(AdminLoginController::class)->prefix('admin')->name('admin.')->group( function(){

    Route::get('/login', 'adminLogin')->name('login');
    Route::post('/login', 'adminLoginCheck')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});


// Route::controller(UserSettingController::class)->prefix('settings')->name('us.')->group(function () {
//     Route::get('profile', 'profile')->name('profile');
//     Route::post('profile', 'profile_store')->name('profile');
//     Route::get('change-password', 'password')->name('password');
//     Route::post('change-password', 'password_store')->name('password');
// });





Route::group(['middleware'=> ['admin'], 'prefix' => 'backend', 'as' => 'b.'], function (){
    
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::controller(AdminController::class)->prefix('admin')->name('admin.')->group(function(){
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('create', 'store')->name('create');
    });
});
