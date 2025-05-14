<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CityController;
// use auth helpers
use Illuminate\Support\Facades\Auth;
use App\Models\User;

// Public authentication routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);



// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Cities resource routes
    Route::apiResource('cities', CityController::class);
    
    // Custom search routes for cities
    Route::get('/cities/country/{country}', [CityController::class, 'searchByCountry']);
    Route::get('/cities/continent/{continent}', [CityController::class, 'searchByContinent']);
    Route::get('/cities/founded/{year}', [CityController::class, 'getCitiesByFoundedYear']);

    // custom routes get a city in the 20th century
    Route::get('/cities/20th-century', [CityController::class, 'getCitiesIn20thCentury']);


});
