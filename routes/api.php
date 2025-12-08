<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('shops', App\Http\Controllers\api\ShopController::class);
Route::apiResource('laundries', App\Http\Controllers\api\LaundryController::class);
Route::apiResource('users', App\Http\Controllers\api\UserController::class);
Route::apiResource('promos', App\Http\Controllers\api\PromoController::class);
