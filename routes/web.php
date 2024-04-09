<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\VisualisasiController;

Route::middleware(['guest', 'no-cache'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'deauthenticate']);

    Route::get('/', [LandingController::class, 'index'])->name('dashboard')->middleware('no-cache');

    Route::get('/daftar-dokumen', [DokumenController::class, 'getDokumen']);

    Route::get('/visualisasi', fn()=> view('visualisasi.index'));

    Route::get('/visualisasi/mahasiswa/calon-mahasiswa/{status}', [VisualisasiController::class, 'getCalonMhs']);
    Route::get('/visualisasi/mahasiswa/mahasiswa-baru/{status}', [VisualisasiController::class, 'getMhsBaru']);
    Route::get('/visualisasi/mahasiswa/mahasiswa-aktif/{status}', [VisualisasiController::class, 'getMhsAktif']);
    Route::get('/visualisasi/mahasiswa/mahasiswa-lulusan/{status}', [VisualisasiController::class, 'getMhsLulusan']);
    Route::get('/visualisasi/mahasiswa/rasio-kelulusan/{status}', [VisualisasiController::class, 'getRasioLulus']);

    Route::get('/visualisasi/mahasiswa/mahasiswa-tugas-akhir', function () {
        return view('visualisasi.mahasiswa.mahasiswa-tugas-akhir');
    });
    
    Route::get('/visualisasi/mahasiswa/mahasiswa-asing', function () {
        return view('visualisasi.mahasiswa.mahasiswa-asing');
    });  

    Route::get('/visualisasi/sdm/tendik', function () {
        return view('visualisasi.sdm.tendik');
    });  

    Route::get('/visualisasi/akreditasi', function () {
        return view('visualisasi.akreditasi');
    });   
    
});

Route::middleware(['auth', 'is-admin'])->group(function () {
    Route::get('/admin', fn () => view('admin.index'));
    Route::resource('/admin/dokumen', DokumenController::class);
    Route::get('/admin/visualisasi', fn () => view('admin.visualisasi.index'));
});