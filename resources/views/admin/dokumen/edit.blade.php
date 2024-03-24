@extends('layouts.main')

@section('content')
<section class="section-padding" style="margin-top: 12vh ;">
  <div class="container">
    <form action="/admin/dokumen/{{ $dokumen->id }}" method="POST" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <label for="nama">Nama</label>
      <input type="text" name="nama" id="nama" value="{{ $dokumen->nama }}" required>
      @if ($errors->has('nama'))
        <p class="error">{{ $errors->first('nama') }}</p>
      @endif
      <label for="kriteria">Kriteria</label>
      <select name="kriteria" id="kriteria" required>
        @for ($i = 1; $i <= 9; $i++)
          <option value="{{ $i }}" {{ $dokumen->kriteria == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
      </select>
      @if ($errors->has('kriteria'))
        <p class="error">{{ $errors->first('kriteria') }}</p>
      @endif
      <label for="sub_kriteria">Sub Kriteria</label>
      <input type="text" name="sub_kriteria" id="sub_kriteria" value="{{ $dokumen->sub_kriteria }}">
      @if ($errors->has('sub_kriteria'))
        <p class="error">{{ $errors->first('sub_kriteria') }}</p>
      @endif
      <label for="catatan">Catatan</label>
      <input type="text" name="catatan" id="catatan" value="{{ $dokumen->catatan }}">
      @if ($errors->has('catatan'))
        <p class="error">{{ $errors->first('catatan') }}</p>
      @endif
      <label for="tipe_dokumen">Tipe Dokumen</label>
      <select name="tipe_dokumen" id="tipe_dokumen">
        <option value="file" {{ $dokumen->tipe != 'URL' ? 'selected' : '' }}>File</option>
        <option value="url" {{ $dokumen->tipe == 'URL' ? 'selected' : '' }}>URL</option>
      </select>
      <div id="file-container">
        <label for="file">File</label>
        <input type="file" name="file" id="file" {{ $dokumen->tipe == 'URL' ? 'disabled' : '' }}>
      </div>
      @if ($dokumen->tipe != 'URL')
        <a href="{{ url('storage/'.$dokumen->path) }}" target="_blank">{{ basename($dokumen->path) }}</a>
      @endif
      @if ($errors->has('file'))
        <p class="error">{{ $errors->first('file') }}</p>
      @endif
      <div id="url-container">
        <label for="url">URL</label>
        <input type="text" name="url" id="url" value="{{ $dokumen->tipe == 'URL' ? $dokumen->path : '' }}" {{ $dokumen->tipe != 'URL' ? 'disabled' : '' }}>
      </div>
      @if ($dokumen->tipe == 'URL')
        <a href="{{ $dokumen->path }}" target="_blank">{{ $dokumen->nama }}</a>
      @endif
      @if ($errors->has('url'))
        <p class="error">{{ $errors->first('url') }}</p>
      @endif
      <script>
        document.getElementById('tipe_dokumen').addEventListener('change', function() {
          const value = this.value;
          const fileInput = document.getElementById('file');
          const urlInput = document.getElementById('url');
          
          if (value == 'file') {
            fileInput.disabled = false;
            urlInput.disabled = true;
          } else {
            fileInput.disabled = true;
            urlInput.disabled = false;
          }
        });
      </script>
      </script>
      <button type="submit">Submit</button>
    </form>
  </div>
</section>
@endsection