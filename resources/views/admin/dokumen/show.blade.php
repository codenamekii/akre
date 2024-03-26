
@extends('layouts.main')

@section('content')
<section class="section-padding" style="margin-top: 12vh;">
  <div class="section-header text-center">
    <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Lihat Dokumen</h2>
    <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
  </div>
  <div class="container " style="width:70%;">

    <div class="card shadow">
      <div class="card-header " style="background-color: rgb(235, 234, 234)">
        <span class="h5 text-success " style="font-weight: 300;"> {{ $dokumen->nama }}</span>
        <span class="h5 text-success float-right">Kriteria {{ $dokumen->kriteria }} | <span class="h5 text-success"> {{ $dokumen->tipe }}</span></span>
      </div>
      <div class="card-body">
        <h5 class="card-title"><span class="h4 text-dark"> {{ $dokumen->sub_kriteria }}</span></h5>
        <p class="card-text mb-3"><span class="h5 text-dark"> {{ $dokumen->catatan }}</span></p>        
        <a href="{{ $dokumen->path }}" class="h5 text-success">{{ $dokumen->path }}</a>
      </div>
    </div>


  
</section>


@endsection