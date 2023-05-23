<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::resource('/', PesanController::class);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/pesan', [PesanController::class, 'pesan']);
Route::resource('pesan', PesanController::class)->middleware('auth');
Route::get('/checkout',  [PesanController::class, 'checkout'])->middleware('auth');
Route::get('/checkout-confirm',  [PesanController::class, 'konfirmasi'])->middleware('auth');

Route::middleware(['auth', 'admin'])->group(function () {
  Route::resource('dashboard', DashboardController::class);
});

