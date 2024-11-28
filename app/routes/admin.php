<?php

use App\Http\Controllers\Admin\api\GetUserJsonController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PasswordController;

use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group(function () {
  Route::get('login', [LoginController::class, 'index'])->name('login');
  Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
});

Route::middleware('auth:admin')->group(function() {
  Route::get('logout', [LoginController::class, 'logout'])->name('logout');
  Route::get('setting', [SettingController::class, 'index'])->name('setting');
  Route::get('user-json', [GetUserJsonController::class, 'index'])->name('user-json');

  Route::resource('password', PasswordController::class);
  Route::resource('user', UserController::class);
});
