<?php

use App\Http\Controllers\Api\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register'])
    ->middleware('auth:sanctum')
    ->name('register');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login');

Route::get('/logout', [AuthController::class, 'logout'])
    ->middleware('auth:sanctum')
    ->name('logout');

Route::get('/logout-from-all-devices', [AuthController::class, 'logoutFromAllDevices'])
    ->middleware('auth:sanctum')
    ->name('logout-from-all-devices');
