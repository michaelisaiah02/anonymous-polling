<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

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

// Login
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [LoginController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [LoginController::class, 'create_user']);

// Poll
Route::resource('/poll', PollController::class)->middleware('auth');
Route::resource('/vote', VoteController::class)->middleware('auth');