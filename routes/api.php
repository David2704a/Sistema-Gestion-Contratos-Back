<?php

use App\Http\Controllers\AuthController;
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

Route::post('/login', [AuthController::class, 'login']);
