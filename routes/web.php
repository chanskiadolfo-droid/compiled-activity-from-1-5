<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReservationController;

Route::get('/', fn() => redirect()->route('reservations.index'));

Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/{id}', [ItemController::class, 'show'])->name('items.show');

Route::get('/form', [FormController::class, 'create'])->name('form.create');
Route::post('/form', [FormController::class, 'store'])->name('form.store');

Route::resource('reservations', ReservationController::class);
