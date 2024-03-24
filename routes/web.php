<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\LandingController;

Route::middleware(['guest', 'no-cache'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'deauthenticate']);

    Route::get('/', [LandingController::class, 'index'])->name('dashboard')->middleware('no-cache');

    Route::get('/daftar-dokumen', [DokumenController::class, 'getDokumen']);

    Route::get('/visualisasi', fn()=> view('visualisasi.index'));
});

Route::middleware(['auth', 'is-admin'])->group(function () {
    Route::get('/admin', fn () => view('admin.index'));
    Route::resource('/admin/dokumen', DokumenController::class);
    Route::get('/admin/visualisasi', fn () => view('admin.visualisasi.index'));
});