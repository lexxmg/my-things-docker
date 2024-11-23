<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;

use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group(function () {
  Route::get('login', [LoginController::class, 'index'])->name('login');
  Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
});

Route::middleware('auth:admin')->group(function() {
  Route::get('logout', [LoginController::class, 'logout'])->name('logout');

  Route::resource('user', UserController::class);
});
