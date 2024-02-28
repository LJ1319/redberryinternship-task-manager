<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('lang/{locale}', [LocaleController::class, 'setLocale'])->name('locale');

Route::get('/', [TaskController::class, 'index'])->name('dashboard')->middleware('auth');

Route::middleware('auth')->prefix('tasks')->name('tasks.')->group(function () {
	Route::view('/create', 'tasks.create')->name('create');
	Route::post('/create', [TaskController::class, 'store'])->name('store');
	Route::get('/show/{task}', [TaskController::class, 'show'])->name('show');
	Route::delete('/delete-old', [TaskController::class, 'deleteOld'])->name('delete_old');
});

Route::view('login', 'auth.login')->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate')->middleware('guest');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
