<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RunController;
use App\Http\Controllers\TagController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('runs', RunController::class);

    Route::post('/tags', [TagController::class, 'store']);
    Route::post('/runs/{id}/tags', [RunController::class, 'attachTag']);
    Route::delete('/runs/{id}/tags', [RunController::class, 'detachTag']);
});