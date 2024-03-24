@extends('layouts.main')

@section('content')
<section class="" style="margin-top: 18vh">
  <div class="container">
    <form class="row justify-content-center wow fadeInRight" ata-wow-delay="0.3s" action="/dokumen-hasil" method="get">
      <div class="input-group mb-3">
        <select class="form-select p-1 bg-success text-light " name="kriteria" id="" style="width: 80px;">
          <option value="" selected>Kriteria</option>
          @for ($i = 1; $i <= 9; $i++)
          <option value="{{ $i }}" {{ request()->input('kriteria') == $i ? 'selected' : '' }}>{{ 'Kriteria '.$i }}</option>
          @endfor
          <option value="10" {{ request()->input('kriteria') == '10' ? 'selected' : '' }}>Kondisi Eksternal</option>
          <option value="11" {{ request()->input('kriteria') == '11' ? 'selected' : '' }}>Profil Institusi</option>
          <option value="12" {{ request()->input('kriteria') == '12' ? 'selected' : '' }}>Analisis & Penetapan Program Pengembangan</option>
        </select>
        <select class="form-select p2  bg-success text-light " name="tipe" id="" style="width: 60px;">
          <option value="" selected>Tipe</option>
          <option value="URL" {{ request()->input('tipe') == 'URL' ? 'selected' : '' }}>URL</option>
          <option value="PDF" {{ request()->input('tipe') == 'PDF' ? 'selected' : '' }}>PDF</option>
          <option value="Image" {{ request()->input('tipe') == 'Image' ? 'selected' : '' }}>Image</option>
        </select>
        <input type="text" class="form-control shadow" name="result" placeholder="Cari Dokumen.." aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ old('result', request()->input('result')) }}">
        <div class="input-group-append">
          <button class="btn btn-success shadow" id="button-addon2"><i class="bi bi-search"></i></button>
        </div>
      </div>
    </form>
    <div class="row mb-5">
      @foreach ($dokumens as $dokumen)
        <div class="col-md-6 col-lg-6 col-xs-12 my-2">
          <a href="{{ $dokumen->tipe == 'URL' ? $dokumen->path : url('storage/'.$dokumen->path) }}" class="box-link" target="_blank">
              <div class="box-item wow fadeInRight" data-wow-delay="0.3s">
                  <span class="icon">
                    @switch($dokumen->tipe)
                        @case('URL')
                            <i class="bi bi-link-45deg text-primary"></i>
                            <span class="d-block text-white bg-primary mt-1" style="font-size: 10px; border-radius: 20px">URL</span>
                            @break
                        @case('PDF')
                            <i class="bi bi-file-pdf-fill"></i>
                            <span class="d-block text-white bg-success mt-1" style="font-size: 10px; border-radius: 20px">PDF</span>
                            @break
                        @case('Image')
                            <i class="bi bi-image-fill text-secondary"></i>
                            <span class="d-block text-white bg-secondary mt-1" style="font-size: 10px; border-radius: 20px">IMG</span>
                            @break
                    @endswitch
                  </span>
                  <div class="text">
                      <h4>{{ $dokumen->nama }}</h4>
                      <p>{{ $dokumen->catatan }}</p>
                  </div>
              </div>
          </a>
        </div>
      @endforeach
    </div>
    {{ $dokumens->links() }}
    <div class="row mt-5">
      <div class="col-12">
        <a href="/"  class="btn btn-success wow fadeInRight" ata-wow-delay="0.3s"><i class="bi bi-chevron-double-left"></i> Kembali</a>
      </div>
    </div>
  </div>
  
</section>
@endsection