<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    public function getDokumen(Request $request)
    {
        $kriteria = $request->query('kriteria');
        if(!in_array($kriteria, [1, 2, 3, 4, 5, 6, 7, 8, 9]))
            return abort(404);

        return view('dokumen.index', [
            'title' => 'Daftar Dokumen',
            'dokumens' => Dokumen::where('kriteria', $kriteria)->get()
        ]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dokumen.index', [
            'title' => 'Admin Daftar Dokumen',
            'dokumens' => Dokumen::latest()->paginate(4),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dokumen.create', [
            'title' => 'Admin Tambah Dokumen',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'kriteria' => 'required|numeric|between:1,9',
            'sub_kriteria' => 'max:255',
            'catatan' => 'max:255',
            'file' => 'required_without_all:url|mimes:pdf,png,jpg,jpeg|max:2048',
            'url' => 'required_without_all:file|url|max:255',
        ], [
            'required' => ':attribute wajib diisi!',
            'mimes' => ':attribute harus berupa PDF atau gambar',
            'max' => ':attribute maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'between' => ':attribute harus diantara 1 sampai 9',
            'required_without_all' => ':attribute harus diisi jika :values tidak diisi',
            'url' => ':attribute harus berupa URL yang valid',
        ], [
            'nama' => 'Nama',
            'kriteria' => 'Kriteria',
            'sub_kriteria' => 'Sub Kriteria',
            'catatan' => 'Catatan',
            'file' => 'File',
            'url' => 'URL',
        ]);

        $prepareData = [
            'nama' => $request->nama,
            'kriteria' => $request->kriteria,
            'sub_kriteria' => $request->sub_kriteria,
            'catatan' => $request->catatan,
            // 'path' => $request->file('file') ? $request->file('file')->store('dokumen') : null,
            // 'url' => $request->url
        ];

        $mimeType = $request->file('file') ? $request->file('file')->getMimeType() : $prepareData['tipe'] = 'URL';
        if(str_contains($mimeType, 'pdf')){
            $prepareData['tipe'] = 'PDF';
        } else if(str_contains($mimeType, 'image')){
            $prepareData['tipe'] = 'Image';
        }

        if($prepareData['tipe'] != 'URL'){
            $prepareData['path'] =  $request->file('file')->store('dokumen');
        } else {
            $prepareData['path'] = $request->url;
        }

        Dokumen::create($prepareData);

        return redirect('/admin/dokumen')->with('success', 'Dokumen baru ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dokumen $dokuman)
    {
        return view('admin.dokumen.show', [
            'title' => 'Admin Detail Dokumen',
            'dokumen' => $dokuman
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokumen $dokuman)
    {
        return view('admin.dokumen.edit', [
            'title' => 'Admin Edit Dokumen',
            'dokumen' => $dokuman
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokumen $dokuman)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'kriteria' => 'required|numeric|between:1,9',
            'sub_kriteria' => 'max:255',
            'catatan' => 'max:255',
            'file' => 'nullable|mimes:pdf,png,jpg,jpeg|max:2048|prohibits:url',
            'url' => 'nullable|url|max:255|prohibits:file',
        ], [
            'required' => ':attribute wajib diisi!',
            'mimes' => ':attribute harus berupa PDF atau gambar',
            'max' => ':attribute maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'between' => ':attribute harus diantara 1 sampai 9',
            'prohibits' => 'Hanya isi salah satu (File/URL)',
            'url' => ':attribute harus berupa URL yang valid',
        ], [
            'nama' => 'Nama',
            'kriteria' => 'Kriteria',
            'sub_kriteria' => 'Sub Kriteria',
            'catatan' => 'Catatan',
            'file' => 'File',
            'url' => 'URL',
        ]);

        $prepareData = [
            'nama' => $request->nama,
            'kriteria' => $request->kriteria,
            'sub_kriteria' => $request->sub_kriteria,
            'catatan' => $request->catatan,
            // 'path' => $request->file('file') ? $request->file('file')->store('dokumen') : null,
            // 'url' => $request->url
        ];

        if($dokuman->tipe != 'URL' && $request->url) {
            Storage::delete($dokuman->path);
        }

        if($request->hasFile('file')) {
            $prepareData['path'] = $request->file('file')->store('dokumen');
            $prepareData['tipe'] = str_contains($request->file('file')->getMimeType(), 'pdf') ? 'PDF' : 'Image';
        } else if($request->url) {
            $prepareData['path'] = $request->url;
            $prepareData['tipe'] = 'URL';
        } else {
            $prepareData['path'] = $dokuman->path;
            $prepareData['tipe'] = $dokuman->tipe;
        }

        $dokuman->update($prepareData);

        return redirect('/admin/dokumen')->with('success', 'Dokumen diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokumen $dokuman)
    {
        if($dokuman->tipe != 'URL'){
            Storage::delete($dokuman->path);
        }

        $dokuman->delete();
        return redirect('/admin/dokumen')->with('success', 'Dokumen dihapus');
    }
}
