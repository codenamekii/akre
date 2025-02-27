@extends('layouts.main')

@section('content')
<section class="section-padding" style="margin-top: 9vh ;">
  <div class="section-header text-center">
    <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Edit Dokumen</h2>
    <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
  </div>
  <div class="container border rounded shadow" style="width:70%;">
    
    <form action="/admin/dokumen/{{ $dokumen->id }}" method="POST" id="form" enctype="multipart/form-data">
      <div class="row justify-content-between align-items-center p-3">
        @method('PUT')
        @csrf
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
            <label for="nama" class=" text-dark h6">Nama</label>
            <input  class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" id="nama" value="{{ old('nama', $dokumen->nama) }}" required>
            @if ($errors->has('nama'))
              <p class="error text-danger">{{ $errors->first('nama') }}</p>
            @endif
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
            <label for="kriteria"  class=" text-dark h6" >Kriteria</label> <br>
            <select class="form-control @error('kriteria') is-invalid @enderror" name="kriteria" id="kriteria" required>
              @for ($i = 1; $i <= 9; $i++)
                <option value="{{ $i }}" {{ old('kriteria', $dokumen->kriteria) == $i ? 'selected' : '' }}>{{ 'Kriteria '. $i }}</option>
              @endfor
              <option value="10" {{ old('kriteria', $dokumen->kriteria) == 10 ? 'selected' : '' }}>Kondisi Eksternal</option>
              <option value="11" {{ old('kriteria', $dokumen->kriteria) == 11 ? 'selected' : '' }}>Profil Institusi</option>
              <option value="12" {{ old('kriteria', $dokumen->kriteria) == 12 ? 'selected' : '' }}>Gugus Jaminan Mutu</option>
            </select>
            @if ($errors->has('kriteria'))
              <p class="error text-danger">{{ $errors->first('kriteria') }}</p>
            @endif
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
            <label for="sub_kriteria" class=" text-dark h6">Sub Kriteria</label>
            <input class="form-control @error('sub_kriteria') is-invalid @enderror" type="text" name="sub_kriteria" id="sub_kriteria" value="{{ old('sub_kriteria', $dokumen->sub_kriteria) }}">
            @if ($errors->has('sub_kriteria'))
              <p class="error text-danger">{{ $errors->first('sub_kriteria') }}</p>
            @endif
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
          <label class=" text-dark h6" for="tipe_dokumen">Tipe Dokumen</label><br>
          <select class="form-control" name="tipe_dokumen" id="tipe_dokumen">
            <option value="file" {{ old('tipe_dokumen', $dokumen->tipe) != 'URL' ? 'selected' : '' }}>File</option>
            <option value="url" {{ old('tipe_dokumen', $dokumen->tipe) == 'URL' ? 'selected' : '' }}>URL</option>
          </select>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
          <div class="mb-3">
            <label  class=" text-dark h6" for="file">File</label>
            <input class="form-control @error('file') is-invalid @enderror" type="file" name="file" id="file" {{ $dokumen->tipe == 'URL' ? 'disabled' : '' }}>
          </div>                     
          @if ($errors->has('file'))
          <p class="error text-danger">{{ $errors->first('file') }}</p>
          @endif
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
          <label class=" text-dark h6" for="url">URL</label>
          <input class="form-control @error('url') is-invalid @enderror" type="text" name="url" id="url" value="{{ $dokumen->tipe == 'URL' ? old('url', $dokumen->path) : '' }}" {{ $dokumen->tipe != 'URL' ? 'disabled' : '' }}>
          @if ($errors->has('url'))
            <p class="error text-danger">{{ $errors->first('url') }}</p>
          @endif
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
          <a href="{{ $dokumen->tipe == 'URL' ? $dokumen->path : url('storage/' . $dokumen->path) }}" class="btn btn-link" target="_blank">
            {{-- {!! $dokumen->tipe == 'URL' ? preg_replace('/(.{30})/', '$1<br>', $dokumen->path) : preg_replace('/(.{30})/', '$1<br>', basename($dokumen->path)) !!} --}}
            {{ $dokumen->tipe == 'URL' ? $dokumen->path : basename($dokumen->path) }}
          </a>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 my-2">
            <label for="catatan" class=" text-dark h6 @error('catatan') is-invalid @enderror">Catatan</label>
            <textarea class="form-control" name="catatan" id="catatan" id="floatingTextarea">{{ old('catatan', $dokumen->catatan) }}</textarea>
            @if ($errors->has('catatan'))
              <p class="error text-danger">{{ $errors->first('catatan') }}</p>
            @endif
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 my-2 d-flex justify-content-between">
          <a href="/admin/dokumen"  class="btn btn-success wow fadeInRight" ata-wow-delay="0.3s"><i class="bi bi-chevron-double-left"></i> Kembali</a>
          <button class="btn btn-success mx-1 wow fadeInRight" type="submit">Submit</button>
        </div>
      </div>
    </form>
    
  </div>
  <script>
    document.getElementById('tipe_dokumen').addEventListener('change', function() {
      const value = this.value;
      const fileInput = document.getElementById('file');
      const urlInput = document.getElementById('url');
      
      if (value == 'file') {
        // fileInput.required = true;
        // urlInput.required = false;
        fileInput.disabled = false;
        urlInput.disabled = true;
      } else {
        // fileInput.required = false;
        // urlInput.required = true;
        fileInput.disabled = true;
        urlInput.disabled = false;
      }
    });
  </script>
</section>
@endsection