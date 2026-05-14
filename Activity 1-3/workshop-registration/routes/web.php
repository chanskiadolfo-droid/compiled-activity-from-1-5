<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', fn() => redirect('/form'));
Route::get('/form', [FormController::class, 'create']);
Route::post('/form', [FormController::class, 'store']);
Route::get('/success', [FormController::class, 'success']);
