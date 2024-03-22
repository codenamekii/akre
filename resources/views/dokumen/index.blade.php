@extends('layouts.main')

@section('content')
  <!-- Services Section Start -->
<section id="dokumen" class="section-padding" style="margin-top: 12vh ;">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title animate__animated animate__fadeInDown" data-wow-delay="0.3s">SUMBER DAYA MANUSIA</h2>
      <div class="shape animate__animated animate__fadeInDown" data-wow-delay="0.3s"></div>
      <span class="text-secondary animate__animated animate__fadeInDown" data-wow-delay="0.3s">5 Dokumen</span>
    </div>
    <div class="row">
      <!-- Services item -->
      @foreach ($dokumens as $dokumen)
        <div class="col-md-6 col-lg-6 col-xs-12 my-2">
          <div class="box-item wow fadeInRight" data-wow-delay="0.3s">
            <span class="icon">
              <i class="ini lni-files"></i>
            </span>
            <div class="text">
              <h4><a href="{{ $dokumen->tipe == 'URL' ? $dokumen->path : url('storage/'.$dokumen->path) }}" target="_blank">{{ $dokumen->nama }}</a></h4>
              <p>{{ $dokumen->catatan }}</p>
            </div>
          </div>
        </div>
      @endforeach
      <!-- Services item -->
    </div>
  </div>
</section>
<!-- Services Section End -->
@endsection