<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Run;
use App\Http\Resources;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('runs', function(){
    $runs = Run::orderBy('date')->get();

    return new Resources\RunCollection($runs);
});

Route::post('runs', function(Request $request){
    $request->validate([
        
    ]);
    $user = User::inRandomOrder()->first();

    $run = $user->runs()->create($request->all());

    return new Resources\Run($run);
});