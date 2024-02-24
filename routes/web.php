<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index'])->name('home')->middleware('auth');

Route::view('login', 'auth.login')->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate')->middleware('guest');
