<?php

use App\Http\Controllers\IntegrationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();

        if ($user && $user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.dashboard');
    })->name('dashboard');

    Route::get('/admin/dashboard', [IntegrationController::class, 'admin'])
        ->name('admin.dashboard');

    Route::get('/user/dashboard', [IntegrationController::class, 'user'])
        ->name('user.dashboard');
});

require __DIR__.'/auth.php';
