@extends('layouts.main')

@section('content')
<section id="services" class="section-padding">
  <div class="container mt-5">
    <div class="section-header text-center ">
      <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Admin</h2>
      <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
    </div>
    <div class="row justify-content-center" >
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <a class="h4 text-success" href="/admin/dokumen">
        <div class="services-item bg-light border wow fadeInRight py-5" data-wow-delay="0.3s">
          <div class="icon">
            <i class="lni-cog"></i>
          </div>
          <div class="services-content ">
            <span ><a class="h4 text-success" href="/admin/dokumen">Dokumen</a></span>
          </div>
        </div>
        </a>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <a target="_blank" href="https://docs.google.com/spreadsheets/d/1h89dxFF7Kl22RGmz-92pDvuzsyi9lpUiQJV0zOFLA4s/edit?usp=sharing">
        <div class="services-item bg-light border wow fadeInRight py-5" data-wow-delay="0.6s">
          <div class="icon">
            <i class="bi bi-bar-chart-steps"></i>
          </div>
          <div class="services-content">
            <span ><a class="h4 text-success" target="_blank" href="https://docs.google.com/spreadsheets/d/1h89dxFF7Kl22RGmz-92pDvuzsyi9lpUiQJV0zOFLA4s/edit?usp=sharing">Visualisasi</a></span>
          </div>
        </div>
        </a>
      </div>


    </div>
  </div>
</section>
@endsection