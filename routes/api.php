<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use Illuminate\Http\Request;
use App\Http\Middleware\EnsureTokenIsValid;

Route::middleware('token.valid')->post('/create', [GameController::class, 'create']);
Route::get('/listall', [GameController::class, 'listAll']);
Route::get('/games/{name}', [GameController::class, 'getByName']);
Route::put('/update/{name}', [GameController::class, 'update']);
Route::delete('/delete/{name}', [GameController::class, 'delete']);