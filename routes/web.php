<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

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
Route::get('/', fn() => view('redireksi'));

Route::get('/home', [PesanController::class, 'index']);


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/profile',  [ProfileController::class, 'index'])->middleware('auth');
Route::post('/profile/update',  [ProfileController::class, 'update'])->middleware('auth');

Route::resource('pesan', PesanController::class)->middleware('auth');
Route::get('/checkout',  [PesanController::class, 'checkout'])->middleware('auth');
Route::get('/checkout-confirm',  [PesanController::class, 'konfirmasi'])->middleware('auth');
Route::get('/history', [PesanController::class, 'history'])->middleware('auth');
Route::get('/history/{id}', [PesanController::class, 'historyDetail'])->middleware('auth');

Route::middleware(['auth', 'admin'])->group(function () {
  Route::resource('dashboard', DashboardController::class);
});

