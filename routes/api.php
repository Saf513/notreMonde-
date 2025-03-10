<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountryController;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/user', [AuthController::class, 'user'])->middleware('auth:sanctum');


Route::apiResource('countries', CountryController::class)->middleware('auth:sanctum');

Route::post('/countries/{id}/flag', [CountryController::class, 'uploadFlag'])->middleware('auth:sanctum');
Route::get('/countries/{id}/flag', [CountryController::class, 'getFlag']);
