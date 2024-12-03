<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




// Route::controller(UserSettingController::class)->prefix('settings')->name('us.')->group(function () {
//     Route::get('profile', 'profile')->name('profile');
//     Route::post('profile', 'profile_store')->name('profile');
//     Route::get('change-password', 'password')->name('password');
//     Route::post('change-password', 'password_store')->name('password');
// });


Route::controller(HomeController::class)->prefix('home')->name('home.')->group(function () {
    Route::get('dashboard', 'dashboard')->name('dashboard');
});