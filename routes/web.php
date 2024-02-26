<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('lang/{locale}', [LocaleController::class, 'setLocale'])->name('locale');

Route::get('/', [TaskController::class, 'index'])->name('dashboard')->middleware('auth');

Route::view('login', 'auth.login')->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate')->middleware('guest');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
