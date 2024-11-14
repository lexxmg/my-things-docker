<?php

use App\Http\Controllers\BoxController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ThingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.app');
});


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('things', ThingController::class);
Route::resource('boxes', BoxController::class);
Route::resource('search', SearchController::class);