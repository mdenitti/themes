<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CityController;

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
});

// Cookie-based authentication routes
Route::middleware('web')->group(function () {
    Route::post('/login', [AuthController::class, 'cookieLogin']);
    Route::post('/logout', [AuthController::class, 'cookieLogout']);
});