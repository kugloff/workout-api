<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Run;
use App\Http\Resources;
use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('runs', RunController::class);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('runs', RunController::class);
});