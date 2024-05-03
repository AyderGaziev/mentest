<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


Route::post('/users', [UserController::class, 'createUser']);
Route::put('/users/{id}', [UserController::class, 'updateUser']);
Route::delete('/users/{id}', [UserController::class, 'deleteUser']);
Route::post('/login', [UserController::class, 'authenticateUser']);
Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'getUserInfo']);
