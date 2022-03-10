<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\BukutamuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', [FrontController::class, 'index'])->name('front');
Route::post('/submit', [FrontController::class, 'submit'])->name('submit_guest_book');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('guest-book', GuestbookController::class);

Route::resource('buku-tamu', BukutamuController::class);
