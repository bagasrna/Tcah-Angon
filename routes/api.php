<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\EmailController;
use App\Http\Controllers\Api\ArtisanController;
use App\Http\Controllers\Api\PopupController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\AboutusController;
use App\Http\Controllers\Api\PanduanController;
use App\Http\Controllers\Api\KandangController;
use App\Http\Controllers\Api\PeternakController;
use App\Http\Controllers\Api\InvestasiController;
use App\Http\Controllers\Api\PembayaranController;

Route::post('/register', [RegisterController::class, 'index']);
Route::post('/verification', [RegisterController::class, 'verification']);
Route::post('/forgot', [RegisterController::class, 'forgot']);
Route::post('/forgot-verification', [RegisterController::class, 'forgotVerification']);
Route::post('/forgot-code', [EmailController::class, 'forgot']);
Route::post('/login', [LoginController::class, 'index']);
Route::post('/logout', [LogoutController::class, 'index']);

Route::get('/pop-up', [PopupController::class, 'index']);
Route::post('/pop-up', [PopupController::class, 'create']);

Route::get('/faq', [FaqController::class, 'index']);
Route::post('/faq', [FaqController::class, 'create']);
Route::get('/faq/{id}', [FaqController::class, 'show']);

Route::get('/blog', [BlogController::class, 'index']);
Route::post('/blog', [BlogController::class, 'create']);
Route::get('/blog/{id}', [BlogController::class, 'show']);

Route::get('/about-us', [AboutusController::class, 'index']);
Route::post('/about-us', [AboutusController::class, 'create']);
Route::get('/about-us/{id}', [AboutusController::class, 'show']);

Route::get('/panduan', [PanduanController::class, 'index']);
Route::post('/panduan', [PanduanController::class, 'create']);
Route::get('/panduan/{id}', [PanduanController::class, 'show']);

Route::get('/kandang', [KandangController::class, 'index']);
Route::post('/kandang', [KandangController::class, 'create']); // not ready
Route::get('/kandang/{id}', [KandangController::class, 'show']);

Route::get('/peternak', [PeternakController::class, 'index']);
Route::post('/peternak', [PeternakController::class, 'create']); // not ready
Route::get('/peternak/{id}', [PeternakController::class, 'show']);

Route::get('/investasi', [InvestasiController::class, 'index'])->middleware('auth:api');
Route::post('/investasi', [InvestasiController::class, 'create']);
Route::get('/investasi/{id}', [InvestasiController::class, 'show']);

Route::get('/pembayaran', [PembayaranController::class, 'index']);
Route::post('/pembayaran', [PembayaranController::class, 'create']);
Route::get('/pembayaran/{id}', [PembayaranController::class, 'show']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/resend-email', [EmailController::class, 'index'])->name('email');

# Artisan Call
Route::get('/optimize', [ArtisanController::class, 'optimize']);
Route::get('/migrate', [ArtisanController::class, 'migrate']);
Route::get('/fresh', [ArtisanController::class, 'fresh']);
Route::get('/seed', [ArtisanController::class, 'seed']);
Route::get('/key', [ArtisanController::class, 'key']);