<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisualisasiController extends Controller
{
    public function getCalonMhs($status)
    {
        return view('visualisasi.mahasiswa.calon-mahasiswa', ['status' => $status]);
    }
    public function getMhsBaru($status)
    {
        return view('visualisasi.mahasiswa.mahasiswa-baru', ['status' => $status]);
    }
    public function getMhsAktif($status)
    {
        return view('visualisasi.mahasiswa.mahasiswa-aktif', ['status' => $status]);
    }
    public function getMhsLulusan($status)
    {
        return view('visualisasi.mahasiswa.mahasiswa-lulusan', ['status' => $status]);
    }
    public function getRasioLulus($status)
    {
        return view('visualisasi.mahasiswa.rasio-kelulusan', ['status' => $status]);
    }
}
