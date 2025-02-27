<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class VisualisasiController extends Controller
{
    public function show($status, $jenjang){
        $checkStatus = [
            'calon-mahasiswa',
            'mahasiswa-baru',
            'mahasiswa-aktif',
            'mahasiswa-lulusan',
            'rasio-kelulusan',
        ];
        $checkJenjang = [
            'S1',
            'S2',
            'S3',
            'Profesi',
        ];

        if (!in_array($status, $checkStatus) || !in_array($jenjang, $checkJenjang)) {
            abort(404);
        }

        return view('visualisasi.mahasiswa.'.$status, ['jenjang' => $jenjang]);
    }

  public function getMhsLulus($range)
  {
    $spreadsheetId = "1h89dxFF7Kl22RGmz-92pDvuzsyi9lpUiQJV0zOFLA4s"; // Ganti dengan ID Spreadsheet
    $apiKey = "AIzaSyBN3X6UatYoI2tUvvNv7LiOkCzKX18_X3A"; // Ganti dengan API Key Google Sheets
    $sheetName = "MhsLulus"; // Sesuaikan dengan nama sheet
    $url = "https://sheets.googleapis.com/v4/spreadsheets/{$spreadsheetId}/values/{$sheetName}!{$range}?key={$apiKey}";

    $response = Http::get($url);
    $data = $response->json();

    if (!isset($data['values'])) {
      return response()->json(['data' => []], 200);
    }

    $result = [];
    foreach ($data['values'] as $index => $row) {
      if ($index === 0) continue; // Lewati header
      $result[] = [
        'Tahun' => $row[0] ?? '',
        'Jumlah Lulusan' => $row[1] ?? 0,
        'Rata-Rata IPK Lulusan' => isset($row[2]) ? (float) $row[2] : 0,
        'Rata-Rata Masa Studi Lulusan (Tahun)' => isset($row[3]) ? (float) $row[3] : 0,
      ];
    }

    return response()->json(['data' => $result], 200);
  }

  public function fetchSpreadsheetData($range)
  {
    $url = "https://sheets.googleapis.com/v4/spreadsheets/{1h89dxFF7Kl22RGmz-92pDvuzsyi9lpUiQJV0zOFLA4s}/values/{$range}?key={AIzaSyBN3X6UatYoI2tUvvNv7LiOkCzKX18_X3A}";

    $response = Http::get($url);

    if ($response->failed()) {
      return response()->json(['error' => 'Gagal mengambil data dari Google Sheets'], 500);
    }

    return $response->json()['values'] ?? [];
  }

  public function getSpreadsheetData($range)
  {
    return response()->json($this->fetchSpreadsheetData($range));
  }
}
