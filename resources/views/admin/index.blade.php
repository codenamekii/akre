@extends('layouts.main')

@section('content')
<section id="services" class="section-padding">
  <div class="container mt-5">
    <div class="section-header text-center">
      <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Admin</h2>
      <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
    </div>
    <div class="row justify-content-center" >
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <div class="services-item wow fadeInRight" data-wow-delay="0.3s">
          <div class="icon">
            <i class="lni-cog"></i>
          </div>
          <div class="services-content">
            <span ><a class="h4 text-success" href="/admin/dokumen">Dokumen</a></span>
          </div>
        </div>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <div class="services-item wow fadeInRight" data-wow-delay="0.6s">
          <div class="icon">
            <i class="lni-stats-up"></i>
          </div>
          <div class="services-content">
            <span ><a class="h4 text-success" href="/admin/visualisasi">Visualisasi</a></span>
          </div>
        </div>
      </div>


    </div>
  </div>
</section>
@endsection