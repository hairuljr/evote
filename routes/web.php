<?php

use Illuminate\Support\Facades\Route;
use Hexters\Ladmin\Routes\Ladmin;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::get('/connect/{nim}', [App\Http\Controllers\HomeController::class, 'connect'])->name('connect');
Route::get('/vote', [App\Http\Controllers\HomeController::class, 'vote'])->name('vote');
Route::post('/login-qr', [App\Http\Controllers\HomeController::class, 'login'])->name('login-qr');


// LADMIN
Ladmin::route(function () {

  Route::resource('/withdrawal', WithdrawalController::class); // Example

});
