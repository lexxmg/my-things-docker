<?php

use App\Http\Controllers\BoxController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ThingController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
  Route::get('login', [LoginController::class, 'index'])->name('login');
  Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
});

Route::middleware('auth')->group(function () {
  Route::get('logout', [LoginController::class, 'logout'])->name('logout');
  Route::get('/', [HomeController::class, 'index'])->name('home');

  Route::get('setting', [SettingController::class, 'index'])->name('setting');

  Route::resource('things', ThingController::class);
  Route::resource('boxes', BoxController::class);
  Route::resource('search', SearchController::class);
});
