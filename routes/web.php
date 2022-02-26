<?php

use App\Http\Controllers\Administrator\{CreationController, PhotoCreationController, StudyController, VoteController};
use Illuminate\Support\Facades\Route;
use App\Helpers\Ladmin;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/connect/{nim}', [HomeController::class, 'connect'])->name('connect');
Route::get('/login-manual', [HomeController::class, 'loginManual'])->name('login-manual');
Route::post('/login-qr', [HomeController::class, 'login'])->name('login-qr');

Route::middleware(['web', 'check.login'])->group(function () {
  Route::get('/vote', [HomeController::class, 'vote'])->name('vote');
  Route::get('/detail/{slug}', [HomeController::class, 'detail'])->name('detail');
  Route::post('/submit-vote', [HomeController::class, 'submitVote'])->name('submit-vote');
  Route::post('/change-vote', [HomeController::class, 'changeVote'])->name('change-vote');
});

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
