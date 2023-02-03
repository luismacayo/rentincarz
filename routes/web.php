<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatcheController;

Route::get('/', [MatcheController::class, 'index']);
