<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GoogleSheetController extends Controller
{
  public function fetchData(Request $request)
  {
    $sheetName = $request->query('sheet', 'MhsAktif');
    $GOOGLE_API_KEY = env('GOOGLE_API_KEY');
    $GOOGLE_SHEET_ID = env('GOOGLE_SHEET_ID');
    $url = "https://sheets.googleapis.com/v4/spreadsheets/$GOOGLE_SHEET_ID/values/$sheetName?key=$GOOGLE_API_KEY";

    $response = Http::get($url);
    return response()->json($response->json());
  }
}

