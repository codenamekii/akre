@extends('layouts.main')

@section('content')
<section class="section-padding" style="margin-top: 12vh ;">
  <div class="section-header text-center">
    <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Tambah Dokumen Baru</h2>
    <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
  </div>
  <div class="container border rounded" style="width:80%;">
    
    <form action="/admin/dokumen" method="POST" enctype="multipart/form-data">
      <div class="row justify-content-between align-items-center">
        @csrf
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
            <label for="nama" class="form-label">Nama</label>
            <input  class="form-control" type="text" name="nama" id="nama" value="{{ old('nama') }}" required>
            @if ($errors->has('nama'))
              <p class="error">{{ $errors->first('nama') }}</p>
            @endif
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
            <label for="kriteria"  class="form-label" >Kriteria</label> <br>
            <select class="form-select" name="kriteria" id="kriteria" required>
              @for ($i = 1; $i <= 9; $i++)
                <option value="{{ $i }}" {{ old('kriteria') == $i ? 'selected' : '' }}>{{ $i }}</option>
              @endfor
            </select>
            @if ($errors->has('kriteria'))
              <p class="error">{{ $errors->first('kriteria') }}</p>
            @endif
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
            <label for="sub_kriteria" class="form-label">Sub Kriteria</label>
            <input class="form-control" type="text" name="sub_kriteria" id="sub_kriteria" value="{{ old('sub_kriteria') }}">
            @if ($errors->has('sub_kriteria'))
              <p class="error">{{ $errors->first('sub_kriteria') }}</p>
            @endif
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
            <label for="catatan" class="form-label">Catatan</label>
            <input class="form-control" type="text" name="catatan" id="catatan" value="{{ old('catatan') }}">
            @if ($errors->has('catatan'))
              <p class="error">{{ $errors->first('catatan') }}</p>
            @endif
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
            <label class="form-label" for="tipe_dokumen">Tipe Dokumen</label><br>
            <select class="form-select" name="tipe_dokumen" id="tipe_dokumen">
              <option value="file" {{ old('tipe_dokumen') == 'file' ? 'selected' : '' }}>File</option>
              <option value="url" {{ old('tipe_dokumen') == 'url' ? 'selected' : '' }}>URL</option>
            </select>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
          <div class="mb-3">
            <label  class="form-label" for="file">File</label>
            <input class="form-control" type="file" name="file" id="file" required>
          </div>                     
          @if ($errors->has('file'))
          <p class="error">{{ $errors->first('file') }}</p>
          @endif
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
            <label class="form-label" for="url">URL</label>
            <input class="form-control" type="text" name="url" id="url" value="{{ old('url') }}" disabled>
            @if ($errors->has('url'))
            <p class="error">{{ $errors->first('url') }}</p>
        </div>        
        @endif
        
        
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12 my-2">
         <button class="btn btn-common" type="submit">Submit</button>
      </div>
    </form>
 
  </div>
  <script>

    document.getElementById('tipe_dokumen').addEventListener('change', function() {
      const value = this.value;
      const fileInput = document.getElementById('file');
      const urlInput = document.getElementById('url');
      
      if (value == 'file') {
        fileInput.required = true;
        urlInput.required = false;
        fileInput.disabled = false;
        urlInput.disabled = true;
      } else {
        fileInput.required = false;
        urlInput.required = true;
        fileInput.disabled = true;
        urlInput.disabled = false;
      }
    });
  </script>
</section>
@endsection