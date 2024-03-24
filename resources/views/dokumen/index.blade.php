@extends('layouts.main')

@section('content')
  <!-- Services Section Start -->
<section id="dokumen" class="section-padding" style="margin-top: 12vh ;">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">{{ strtoupper($h2) }}</h2>
      <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
      <span class="text-secondary wow fadeInDown" data-wow-delay="0.3s">{{ count($dokumens) }} Dokumen</span>
    </div>
    <div class="row">
      <!-- Services item -->
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
      <!-- Services Section End -->
    </div>
  </div>
</section>
@endsection