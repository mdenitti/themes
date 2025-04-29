<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AuthController; // Add this line
use App\Models\Product;
use App\Http\Middleware\EnsureUserIsVerified;
use App\Http\Middleware\IsVerified;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testing', function () {
    $product = Product::create([
        'name' => 'New Product',
        'price' => 99.99
    ]);
    $product->categories()->attach([1, 2, 7]);
});


// Content routes
Route::get('/cities', [CityController::class, 'index'])->middleware(IsVerified::class);

// Dashboard route

Route::get('/about', function () {
    return view('about.index');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/themedays', function () {
    return view('themedays.index');
});

Route::get('/contact', function () {
    return view('contact.index');
});


// Registration Routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register'); // Use the imported class
Route::post('/register', [AuthController::class, 'register']); // Use the imported class