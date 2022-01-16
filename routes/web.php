<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::get('/connect/{nim}', [App\Http\Controllers\HomeController::class, 'connect'])->name('connect');
Route::get('/vote', [App\Http\Controllers\HomeController::class, 'vote'])->name('vote');
Route::post('/login-qr', [App\Http\Controllers\HomeController::class, 'login'])->name('login-qr');
