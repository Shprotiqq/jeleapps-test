<?php

use Illuminate\Support\Facades\Route;

Route::post('/registration', \App\Http\Controllers\Api\UserRegisterController::class);
Route::middleware('auth:sanctum')->get('/profile', \App\Http\Controllers\Api\UserProfileController::class);