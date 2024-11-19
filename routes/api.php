<?php

use App\Http\Controllers\Auth\AuthController as AuthAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/*
=====================================
API LOGIN
=====================================
*/
Route::get('/prueba', function () {
    return 'Esta es una prueba';
});

Route::prefix('auth')->group(function(){
    Route::post('register', [AuthAuthController::class, 'register']);
});

Route::get('/getUsers', [UserController::class, 'getUser']);
