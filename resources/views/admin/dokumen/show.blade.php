
@extends('layouts.main')

@section('content')
<section class="section-padding" style="margin-top: 12vh;">
  <div class="section-header text-center">
    <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Lihat Dokumen</h2>
    <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
  </div>
  <div class="container border rounded shadow" style="width:70%;">
    <div class="row justify-content-between p-3">
      <div class="col-4 py-1">
        <span class="h5 text-dark">Nama</span>
      </div>
      <div class="col-8 py-1">
        <span class="h5 text-dark">: {{ $dokumen->nama }}</span>
      </div>
      <div class="col-4 py-1">
        <span class="h5 text-dark">Kriteria</span>
      </div>
      <div class="col-8 py-1">
        <span class="h5 text-dark">: {{ $dokumen->kriteria }}</span>
      </div>
      <div class="col-4 py-1">
        <span class="h5 text-dark">Sub kriteria</span>
      </div>
      <div class="col-8 py-1">
        <span class="h5 text-dark">: {{ $dokumen->sub_kriteria }}</span>
      </div>
      <div class="col-4 py-1">
        <span class="h5 text-dark">Catatan</span>
      </div>
      <div class="col-8 py-1">
        <span class="h5 text-dark">: {{ $dokumen->catatan }}</span>
      </div>
      <div class="col-4 py-1">
        <span class="h5 text-dark">Tipe</span>
      </div>
      <div class="col-8 py-1">
        <span class="h5 text-dark">: {{ $dokumen->tipe }}</span>
      </div>
      <div class="col-4 py-1">
        <span class="h5 text-dark">Path</span>
      </div>
      <div class="col-8 py-1">
       <span class="h5 text-dark"> : {{ $dokumen->path }}</span>
      </div>


  </div>
</section>


@endsection