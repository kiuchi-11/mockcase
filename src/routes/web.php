<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [ProductController::class, 'index']);

Route::get('/item/{item_id}', [ProductController::class, 'show']);

Route::middleware('auth')->group(function () {
    Route::get('/mypage', [ProductController::class, 'mypage']);
    Route::get('/mypage/profile', [ProfileController::class, 'edit']);
    Route::post('/mypage/profile', [ProfileController::class, 'update']);
});

Route::get('/login', [LoginController::class, 'create'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [LoginController::class, 'store'])
    ->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::get('/sell', [ProductController::class, 'create']);
    Route::post('/sell', [ProductController::class, 'store']);
});

Route::get('/sell', [ProductController::class, 'create'])->middleware('auth');
Route::post('/sell', [ProductController::class, 'store'])->middleware('auth');