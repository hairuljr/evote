<?php

use App\Http\Controllers\Administrator\{CreationController};
use Illuminate\Support\Facades\Route;
use Hexters\Ladmin\Routes\Ladmin;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::get('/connect/{nim}', [App\Http\Controllers\HomeController::class, 'connect'])->name('connect');
Route::get('/vote', [App\Http\Controllers\HomeController::class, 'vote'])->name('vote');
Route::get('/detail', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail');
Route::post('/login-qr', [App\Http\Controllers\HomeController::class, 'login'])->name('login-qr');


// LADMIN
Ladmin::route(function () {

  Route::group(['as' => 'data.', 'prefix' => 'data'], function () {
    Route::resource('/creation', CreationController::class);
  });
});
