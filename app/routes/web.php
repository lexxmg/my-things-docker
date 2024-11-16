<?php

use App\Http\Controllers\BoxController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ThingController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('setting', [SettingController::class, 'index'])->name('setting');

Route::resource('things', ThingController::class);
Route::resource('boxes', BoxController::class);
Route::resource('search', SearchController::class);