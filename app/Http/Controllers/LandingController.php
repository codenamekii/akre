<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        return view('index', [
            'dokumenCount' => Dokumen::count()
        ]);
    }
}
