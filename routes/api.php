<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\EmailController;
use App\Http\Controllers\Api\ArtisanController;

Route::post('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/login', [LoginController::class, 'index'])->name('login');
Route::post('/logout', [LogoutController::class, 'index'])->name('logout');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/send-email', [EmailController::class, 'index'])->name('email');

# Artisan Call
Route::get('/optimize', [ArtisanController::class, 'optimize']);
Route::get('/migrate', [ArtisanController::class, 'migrate']);
Route::get('/fresh', [ArtisanController::class, 'fresh']);