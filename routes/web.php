<?php

use App\Http\Controllers\DokumenController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest', 'no-cache'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'deauthenticate']);

    Route::get('/', fn () => view('index'))->name('dashboard')->middleware('no-cache');

    Route::get('/daftar-dokumen', [DokumenController::class, 'getDokumen']);

    Route::get('/visualisasi', fn()=> view('visualisasi.index'));
});

Route::middleware(['auth', 'is-admin'])->group(function () {
    Route::resource('/admin/dokumen', DokumenController::class);
});