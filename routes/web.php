<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\POSController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\UserController;


Route::get('/home', [POSController::class, 'home']);

Route::prefix('category')->group(function() {
    route::get('/food-beverage', [ProductsController::class, 'foodBeverage']);
    route::get('/beauty-health', [ProductsController::class, 'beautyHealth']);
    route::get('/home-care', [ProductsController::class, 'homeCare']);
    route::get('/baby-kid', [ProductsController::class, 'babyKid']);
});

Route::get('/penjualan', [PenjualanController::class, 'penjualan']);

Route::get('/userPOS', [UserController::class, 'user']);
