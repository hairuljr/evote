<?php

use App\Http\Controllers\Administrator\{CreationController, PhotoCreationController, StudyController, VoteController};
use Illuminate\Support\Facades\Route;
use App\Helpers\Ladmin;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::get('/connect/{nim}', [App\Http\Controllers\HomeController::class, 'connect'])->name('connect');
Route::get('/login-manual', [App\Http\Controllers\HomeController::class, 'loginManual'])->name('login-manual');
Route::get('/vote', [App\Http\Controllers\HomeController::class, 'vote'])->name('vote');
Route::get('/detail/{slug}', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail');
Route::post('/login-qr', [App\Http\Controllers\HomeController::class, 'login'])->name('login-qr');
Route::post('/submit-vote', [App\Http\Controllers\HomeController::class, 'submitVote'])->name('submit-vote');
Route::post('/change-vote', [App\Http\Controllers\HomeController::class, 'changeVote'])->name('change-vote');
Route::get('clear', function () {
  session()->flush();
  return redirect()->route('welcome')->withSuccess('Anda berhasil logout!');
})->name('clear');


// LADMIN
Ladmin::route(function () {

  Route::group(['as' => 'data.', 'prefix' => 'data'], function () {
    Route::resource('/creation', CreationController::class);
    Route::resource('/photocreation', PhotoCreationController::class);
    Route::resource('/study', StudyController::class);
    Route::resource('/vote', VoteController::class);
  });
});
