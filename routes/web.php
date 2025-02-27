<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\VisualisasiController;
use Illuminate\Support\Facades\Http;

Route::middleware(['guest', 'no-cache', 'security-header'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::middleware(['auth', 'security-header'])->group(function () {
    Route::get('/logout', [LoginController::class, 'deauthenticate']);
    Route::get('/', [LandingController::class, 'index'])->name('dashboard')->middleware('no-cache');
    Route::get('/daftar-dokumen', [DokumenController::class, 'getDokumen']);
});

Route::middleware(['security-header'])->prefix('visualisasi')->group(function () {
    Route::view('/', 'visualisasi.index')->name('visualisasi.index');
    
    Route::prefix('mahasiswa')->group(function () {
        Route::get('{status}/{jenjang}', [VisualisasiController::class, 'show']);

        Route::view('mahasiswa-tugas-akhir', 'visualisasi.mahasiswa.mahasiswa-tugas-akhir');
        Route::view('mahasiswa-asing', 'visualisasi.mahasiswa.mahasiswa-asing');
    });

    Route::prefix('sdm')->group(function () {
        Route::prefix('dosen')->group(function () {
            Route::view('per-homebase', 'visualisasi.sdm.dosen.dosen-perHomebase');
            Route::view('per-jabatan', 'visualisasi.sdm.dosen.dosen-perJabatan');
            Route::view('per-pendidikan', 'visualisasi.sdm.dosen.dosen-perPendidikan');
            Route::view('per-sertifikasi', 'visualisasi.sdm.dosen.dosen-perSertifikasi');
            Route::view('per-tidak-tetap', 'visualisasi.sdm.dosen.dosen-perTidakTetap');
        });
        
        Route::view('tendik', 'visualisasi.sdm.tendik');
    });

    Route::view('akreditasi', 'visualisasi.akreditasi');
});

Route::middleware(['auth', 'is-admin', 'security-header'])->group(function () {
    Route::view('/admin', 'admin.index');
    Route::resource('/admin/dokumen', DokumenController::class);
});

Route::get('/get-sheets', function () {
  $sheetId = '1h89dxFF7Kl22RGmz-92pDvuzsyi9lpUiQJV0zOFLA4s';
  $range = 'MhsLulus!A2:D5';
  $apiKey = 'AIzaSyBN3X6UatYoI2tUvvNv7LiOkCzKX18_X3A';

  $url = "https://sheets.googleapis.com/v4/spreadsheets/{$sheetId}/values/{$range}?key={$apiKey}";

  $response = file_get_contents($url);
  $data = json_decode($response, true);

  // Hilangkan header (baris pertama)
  $values = $data['values'] ?? [];
  array_shift($values); // Buang baris pertama (header)

  return response()->json($values);
});
