<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('lang/{locale}', [LocaleController::class, 'setLocale'])->name('locale');

Route::middleware('auth')->controller(TaskController::class)->group(function () {
	Route::get('/', 'index')->name('dashboard');

	Route::prefix('tasks')->name('tasks.')->group(function () {
		Route::view('/create', 'tasks.create')->name('create');
		Route::post('/create', 'store')->name('store');
		Route::get('/{task}', 'show')->name('show');
		Route::delete('/{task?}', 'destroy')->name('destroy');
	});
});

Route::controller(AuthController::class)->group(function () {
	Route::middleware('guest')->group(function () {
		Route::view('login', 'auth.login')->name('login');
		Route::post('login', 'authenticate')->name('authenticate');
	});

	Route::middleware('auth')->group(function () {
		Route::post('logout', 'logout')->name('logout');
	});
});
