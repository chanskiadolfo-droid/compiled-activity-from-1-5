<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index']);

Route::middleware('auth:sanctum')->get('/secure/users', [UserController::class, 'index']);
