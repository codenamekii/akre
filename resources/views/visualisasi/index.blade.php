@extends('layouts.visual')

@section('content')
<!-- Hero Area Start -->
<div id="hero-area" class="hero-area-bg">
  <div class="container">      
    <div class="row">
      <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
        <div class="contents move-effect ">
          <h2 class="head-title">Selamat Datang di Website Pusat Data Akreditasi</h2>
          <p>Pusat Data Bukti Fisik Pendukung Akreditasi Universitas Islam Negeri Sumatera Utara Medan</p>
          <div class="header-button">
            <button class="btn btn-common">Kunjungi</button>
          </div>
          <div class="row">

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center ">
                <span data-purecounter-start="0" data-purecounter-end="9" data-purecounter-duration="0" class="purecounter">9</span>
                <p>Kriteria</p>
              </div>
            </div><!-- End Stats Item -->
        
            <div class="col-lg-3 col-6">
              <div class="stats-item text-center ">
                <span data-purecounter-start="0" data-purecounter-end="681" data-purecounter-duration="0" class="purecounter">681</span>
                <p>Dokumen</p>
              </div>
            </div><!-- End Stats Item -->
        
            <div class="col-lg-3 col-6">
              <div class="stats-item text-center ">
                <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="0" class="purecounter">10</span>
                <p>Fakultas/PPs</p>
              </div>
            </div><!-- End Stats Item -->
        
            <div class="col-lg-3 col-6">
              <div class="stats-item text-center ">
                <span data-purecounter-start="0" data-purecounter-end="54" data-purecounter-duration="0" class="purecounter">54</span>
                <p>Prodi</p>
              </div>
            </div><!-- End Stats Item -->
        
          </div>

        </div>
      </div>
      <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
          <div class="intro-img move-effect ">
              <canvas id="pie-chart"></canvas>
          </div>                        
      </div>
      
  </div> 
</div>
<!-- Hero Area End -->
@endsection
