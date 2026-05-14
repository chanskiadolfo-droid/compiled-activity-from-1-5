<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;

Route::get('/', fn() => redirect('/skills'));
Route::get('/skills', [SkillController::class, 'index']);
Route::get('/skills/{id}', [SkillController::class, 'show']);
