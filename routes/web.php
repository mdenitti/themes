<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Models\Product;

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