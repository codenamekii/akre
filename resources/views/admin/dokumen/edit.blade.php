@extends('layouts.main')

@section('content')
<section class="section-padding" style="margin-top: 12vh ;">
  <div class="section-header text-center">
    <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Edit Dokumen</h2>
    <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
  </div>
  <div class="container border rounded shadow" style="width:70%;">

    <form action="/admin/dokumen/{{ $dokumen->id }}" method="POST" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="row justify-content-between align-items-center p-3">
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
          <label for="nama" class="text-dark">Nama</label>
          <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" id="nama" value="{{ $dokumen->nama }}" required>
          @error('nama')
            <p class="error text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
          <label for="kriteria" class="text-dark">Kriteria</label> <br>
          <select class="form-control @error('kriteria') is-invalid @enderror" name="kriteria" id="kriteria" required>
            @for ($i = 1; $i <= 9; $i++)
              <option value="{{ $i }}" {{ $dokumen->kriteria == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
          </select>
          @error('kriteria')
            <p class="error text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
          <label for="sub_kriteria" class="text-dark">Sub Kriteria</label>
          <input class="form-control @error('sub_kriteria') is-invalid @enderror" type="text" name="sub_kriteria" id="sub_kriteria" value="{{ $dokumen->sub_kriteria }}">
          @error('sub_kriteria')
            <p class="error text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
          <label for="catatan" class="text-dark">Catatan</label>
          <input class="form-control @error('catatan') is-invalid @enderror" type="text" name="catatan" id="catatan" value="{{ $dokumen->catatan }}">
          @error('catatan')
            <p class="error text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
          <label for="tipe_dokumen" class="text-dark">Tipe Dokumen</label> <br>
          <select class="form-control @error('tipe_dokumen') is-invalid @enderror" name="tipe_dokumen" id="tipe_dokumen">
            <option value="file" {{ $dokumen->tipe != 'URL' ? 'selected' : '' }}>File</option>
            <option value="url" {{ $dokumen->tipe == 'URL' ? 'selected' : '' }}>URL</option>
          </select>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2" id="file-container">
          <label for="file" class="text-dark">File</label>
          <input class="form-control @error('file') is-invalid @enderror" type="file" name="file" id="file" {{ $dokumen->tipe == 'URL' ? 'disabled' : '' }}>
          @if ($dokumen->tipe != 'URL')
            <a href="{{ url('storage/'.$dokumen->path) }}" target="_blank">{{ basename($dokumen->path) }}</a>
          @endif
          @error('file')
            <p class="error text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2" id="url-container">
          <label for="url" class="text-dark">URL</label>
          <input class="form-control @error('url') is-invalid @enderror" type="text" name="url" id="url" value="{{ $dokumen->tipe == 'URL' ? $dokumen->path : '' }}" {{ $dokumen->tipe != 'URL' ? 'disabled' : '' }}>
          @if ($dokumen->tipe == 'URL')
            <a href="{{ $dokumen->path }}" target="_blank">{{ $dokumen->nama }}</a>
          @endif
          @error('url')
            <p class="error text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-lg-8 col-md-6 col-sm-12 my-2 justify-content-end d-flex">
          <a href="/admin/dokumen" class="btn btn-success me-1 wow fadeInRight" ata-wow-delay="0.3s"><i class="bi bi-chevron-double-left"></i> Kembali</a>
          <button class="btn btn-success mx-1" type="submit">Submit</button>
        </div>
      </div>
    </form>

  </div>
</section>
@endsection