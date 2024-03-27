@extends('layouts.main')

@section('content')
  <!-- Services Section Start -->
<section id="dokumen" class="section-padding" style="margin-top: 12vh ;">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">{{ strtoupper($h2) }}</h2>
      <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
      <span class="text-secondary wow fadeInDown" data-wow-delay="0.3s">{{ $dokumenCount }} Dokumen</span>
    </div>
    <form class="row justify-content-center wow fadeInRight mx-2" ata-wow-delay="0.3s" action="/daftar-dokumen" method="get">
      <div class="input-group mb-3">
        <select class="form-select p-1 bg-success text-light shadow" name="kriteria" id="" style="width: 90px;">
          <option value="" selected>Kriteria</option>
          @for ($i = 1; $i <= 9; $i++)
          <option value="{{ $i }}" {{ request()->input('kriteria') == $i ? 'selected' : '' }}>{{ 'Kriteria '.$i }}</option>
          @endfor
          <option value="10" {{ request()->input('kriteria') == '10' ? 'selected' : '' }}>Kondisi Eksternal</option>
          <option value="11" {{ request()->input('kriteria') == '11' ? 'selected' : '' }}>Profil Institusi</option>
          <option value="12" {{ request()->input('kriteria') == '12' ? 'selected' : '' }}>Analisis & Penetapan Program Pengembangan</option>
        </select>
        <select class="form-select p2  bg-success text-light shadow" name="tipe" id="" style="width: 60px;">
          <option value="" selected>Tipe</option>
          <option value="URL" {{ request()->input('tipe') == 'URL' ? 'selected' : '' }}>URL</option>
          <option value="PDF" {{ request()->input('tipe') == 'PDF' ? 'selected' : '' }}>PDF</option>
          <option value="Image" {{ request()->input('tipe') == 'Image' ? 'selected' : '' }}>Image</option>
        </select>
        <input type="text" class="form-control " name="result" placeholder="Cari Dokumen.." aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ old('result', request()->input('result')) }}">
        <div class="input-group-append">
          <button class="btn btn-success shadow" id="button-addon2"><i class="bi bi-search"></i></button>
        </div>
      </div>
    </form>
    <div class="row mb-5">
      <!-- Services item -->
      @foreach ($dokumens as $dokumen)
      <div class="col-md-6 col-lg-6 col-xs-12 my-2">
        <a href="{{ $dokumen->tipe == 'URL' ? $dokumen->path : url('storage/'.$dokumen->path) }}" class="box-link"
          target="_blank">
          <div class="box-item wow fadeInRight" data-wow-delay="0.3s">
            <span class="icon">
              @switch($dokumen->tipe)
              @case('URL')
              <i class="bi bi-link-45deg text-primary"></i>
              <span class="d-block text-white bg-success mt-1" style="font-size: 10px; border-radius: 20px">URL</span>
              @break
              @case('PDF')
              <i class="bi bi-file-pdf-fill"></i>
              <span class="d-block text-white bg-success mt-1" style="font-size: 10px; border-radius: 20px">PDF</span>
              @break
              @case('Image')
              <i class="bi bi-image-fill text-success"></i>
              <span class="d-block text-white bg-success mt-1" style="font-size: 10px; border-radius: 20px">IMG</span>
              @break
              @endswitch
            </span>
            <div class="text">
              <h4>{{ $dokumen->nama }}</h4>
              <p class="text-secondary">
                {{ __(($dokumen->kriteria > 9 ? ['Kondisi Eksternal', 'Profil Institusi', 'Analisis & Penetapan Program Pengembangan'][$dokumen->kriteria-10] : 'Kriteria '.$dokumen->kriteria)) }}
              </p>
              <p>{{ $dokumen->catatan }}</p>
              <p class="text-end" style="position: absolute; top: 8px; right: 10px;">{{
                \Carbon\Carbon::parse($dokumen->updated_at)->translatedFormat('d F Y') }}</p>
            </div>
          </div>
        </a>
      </div>
      @endforeach
      <!-- End Services item -->
    </div>
    {{ $dokumens->onEachSide(1)->links() }}
    <div class="row mt-5">
      <div class="col-12">
        <a href="/"  class="btn btn-success wow fadeInRight" ata-wow-delay="0.3s"><i class="bi bi-chevron-double-left"></i> Kembali</a>
      </div>
    </div>
  </div>
</section>
@endsection