<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest', 'no-cache'])->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'deauthenticate']);

    Route::get('/dashboard', fn () => view('dashboard.index'))->name('dashboard')->middleware('no-cache');
});

Route::view('/dashboard/dokumen', 'dashboard.dokumen.index');