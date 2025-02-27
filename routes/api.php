<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleSheetController;
use App\Http\Controllers\VisualisasiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/google-sheet', [GoogleSheetController::class, 'fetchData']);
Route::get('/visualisasi/MhsLulus/{range}', [VisualisasiController::class, 'getMhsLulus']);
Route::get('/api/visualisasi', [VisualisasiController::class, 'getDataFromSheet']);
Route::get('/spreadsheet/rasioLulus/{range}', [VisualisasiController::class, 'getSpreadsheetData']);
