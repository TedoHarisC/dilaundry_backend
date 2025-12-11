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

Route::post('login', [App\Http\Controllers\api\UserController::class, 'login']);
Route::post('register', [App\Http\Controllers\api\UserController::class, 'register']);

// Route using sanctum middleware
Route::middleware('auth:sanctum')->group(function () {
    // Laundry
    Route::get('/laundry/user/{userId}', [App\Http\Controllers\api\LaundryController::class, 'getByUser']);
    Route::post('/laundry/claim', [App\Http\Controllers\api\LaundryController::class, 'claim']);

    // Promo
    Route::post('/promo/limit', [App\Http\Controllers\api\PromoController::class, 'readLimit']);

    // Shop
    Route::get('/shop/recommendation', [App\Http\Controllers\api\ShopController::class, 'recommendation']);
    Route::get('/shop/search/{city}', [App\Http\Controllers\api\ShopController::class, 'searchByCity']);
});
