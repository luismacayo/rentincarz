<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatcheController;

Route::get('/', [MatcheController::class, 'index'])->name('today');
Route::get('/nextday', [MatcheController::class, 'nextday'])->name('nextday');
Route::get('/week', [MatcheController::class, 'week'])->name('week');
Route::get('/past', [MatcheController::class, 'past'])->name('past');
