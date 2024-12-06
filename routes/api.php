<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/prueba', function () {
    return response()->json(['message' => 'Esta es una prueba']);
});
/*
=====================================
API LOGIN
=====================================
*/


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


/*
=====================================
USERS
=====================================
*/

Route::get('/getUser', [UserController::class, 'getUser']);
