<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;

Route::get('/', function () {
    return view('welcome');
});


// Content routes
Route::get('/cities', [CityController::class, 'index']);
Route::get('/about', function () {
    return view('about.index');
});

Route::get('/themedays', function () {
    return view('themedays.index');
});

Route::get('/contact', function () {
    return view('contact.index');
});


// Registration Routes
Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);