<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Google\Client as GoogleClient;
use Google\Service\Sheets;

class GoogleSheet extends Model
{
  use HasFactory;

  public function fetchSheet($sheet, $range)
  {
    $client = new GoogleClient();
    $client->setAuthConfig('..\storage\app\uinsu-aipt-visualisasi-data-9b9dab81d2c0.json');
    $client->addScope(Sheets::SPREADSHEETS_READONLY);
    $sheets = new Sheets($client);

    $spreadsheetId = env('SPREADSHEET_ID');
    $locator = $sheet.'!'.$range;

    // $params = array('alt' => 'json');

    $response = $sheets->spreadsheets_values->get($spreadsheetId, $locator);
    $values = $response->getValues();

    $keys = array_shift($values);
    $result = [];

    foreach ($values as $value) {
      $result[] = array_combine($keys, $value);
    }

    return json_encode($result);
  }

  /**
   * Tabulator untuk memecah data dengan batas 'break' di spreadsheet
   */
  private function complexTabulator($values){
    $tables = [];
    $headerRow = null;
    
    foreach ($values as $row) {
      if ($row[0] === 'break') {
      $headerRow = null;
        continue;
      }
  
      if (empty($row) || $headerRow === $row) {
        continue;
      }
  
      if ($headerRow === null) {
        $headerRow = $row;
        continue;
      }
  
      $rowData = [];
      foreach ($headerRow as $index => $key) {
        $rowData[$key] = isset($row[$index]) ? $row[$index] : null;
      }
      $tables[] = $rowData;
    }

    return $tables;
  }
}
