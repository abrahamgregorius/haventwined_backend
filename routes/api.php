<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\InfoController;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/info', [InfoController::class, 'index']);
Route::get('/banner', [BannerController::class, 'index']);
Route::get('/banner/{banner}', [BannerController::class, 'show']);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/info', [InfoController::class, 'update']);
    Route::post('/banner', [BannerController::class, 'store']);
    Route::put('/banner/{banner}', [BannerController::class, 'update']);
    Route::delete('/banner/{banner}', [BannerController::class, 'destroy']);
});

