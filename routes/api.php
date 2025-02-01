<?php

use App\Http\Controllers\GameCharController;
use App\Http\Controllers\GameContoller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('games',GameContoller::class);
Route::apiResource('game_chars',GameCharController::class);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
