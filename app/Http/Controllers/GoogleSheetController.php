<?php

namespace App\Http\Controllers;

use App\Models\GoogleSheet;
use Illuminate\Http\Request;

class GoogleSheetController extends Controller
{
    public function index($sheet, $range){
        return (new GoogleSheet)->fetchSheet($sheet, $range);
    }
}
