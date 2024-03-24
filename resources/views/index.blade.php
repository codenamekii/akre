@extends('layouts.main')

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
            <form class="d-inline" action="/dokumen-hasil" method="get">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="result" placeholder="Cari Dokumen.." aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ old('result', request()->input('result')) }}">
                <select name="kriteria" id="" style="width: 70px;">
                  <option value="" selected>Kriteria</option>
                  @for ($i = 1; $i <= 9; $i++)
                    <option value="{{ $i }}" {{ request()->input('kriteria') == $i ? 'selected' : '' }}>{{ 'Kriteria '.$i }}</option>
                  @endfor
                  <option value="10" {{ request()->input('kriteria') == '10' ? 'selected' : '' }}>Kondisi Eksternal</option>
                  <option value="11" {{ request()->input('kriteria') == '11' ? 'selected' : '' }}>Profil Institusi</option>
                  <option value="12" {{ request()->input('kriteria') == '12' ? 'selected' : '' }}>Analisis & Penetapan Program Pengembangan</option>
                </select>
                <select name="tipe" id="" style="width: 70px;">
                  <option value="" selected>Tipe</option>
                  <option value="URL" {{ request()->input('tipe') == 'URL' ? 'selected' : '' }}>URL</option>
                  <option value="PDF" {{ request()->input('tipe') == 'PDF' ? 'selected' : '' }}>PDF</option>
                  <option value="Image" {{ request()->input('tipe') == 'Image' ? 'selected' : '' }}>Image</option>
                </select>
                <div class="input-group-append">
                  <button class="btn btn-common" id="button-addon2">Cari</button>
                </div>
              </div>
            </form>
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
                <span data-purecounter-start="0" data-purecounter-end="681" data-purecounter-duration="0" class="purecounter">{{ $dokumenCount }}</span>
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
        <div class="intro-img">
          <img class="shape-one " src="https://html.creativegigstf.com/sinco/images/assets/ils_13_1.svg" alt="">
          <img class="img-fluid move-effect" src="https://html.creativegigstf.com/sinco/images/assets/ils_13.svg" alt="">
        </div>            
      </div>
    </div>
  </div> 
</div>
<!-- Hero Area End -->

<!-- Services Section Start -->
<section id="services" class="section-padding">
  <div class="container">
    <div class="section-header text-center">
      <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Laporan Evaluasi Diri</h2>
      <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
    </div>
    <div class="row">
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <div class="services-item wow fadeInRight" data-wow-delay="0.3s">
          <div class="icon">
            <i class="lni-cog"></i>
          </div>
          <div class="services-content">
            <h3><a href="/dokumen-daftar?kriteria=10">Kondisi Eksternal</a></h3>
            <p>Donec tincidunt bibendum gravida. </p>
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
            <h3><a href="/dokumen-daftar?kriteria=11">Profil Institusi</a></h3>
            <p>Donec tincidunt bibendum gravida. </p>
          </div>
        </div>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <div class="services-item wow fadeInRight" data-wow-delay="0.9s">
          <div class="icon">
            <i class="lni-users"></i>
          </div>
          <div class="services-content">
            <h3><a href="/dokumen-daftar?kriteria=1">Kriteria 1</a></h3>
            <p>Visi, Misi, Tujuan dan Startegi</p>
          </div>
        </div>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <div class="services-item wow fadeInRight" data-wow-delay="1.2s">
          <div class="icon">
            <i class="lni-layers"></i>
          </div>
          <div class="services-content">
            <h3><a href="/dokumen-daftar?kriteria=2">Kriteria 2</a></h3>
            <p>Tata Pamong, Tata Kelola, dan Kerja Sama</p>
          </div>
        </div>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <div class="services-item wow fadeInRight" data-wow-delay="1.5s">
          <div class="icon">
            <i class="lni-mobile"></i>
          </div>
          <div class="services-content">
            <h3><a href="/dokumen-daftar?kriteria=3">Kriteria 3</a></h3>
            <p>Mahasisawa</p>
          </div>
        </div>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <div class="services-item wow fadeInRight" data-wow-delay="1.8s">
          <div class="icon">
            <i class="lni-rocket"></i>
          </div>
          <div class="services-content">
            <h3><a href="/dokumen-daftar?kriteria=4">Kriteria 4</a></h3>
            <p>Sumber Daya Manusia</p>
          </div>
        </div>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <div class="services-item wow fadeInRight" data-wow-delay="1.2s">
          <div class="icon">
            <i class="lni-layers"></i>
          </div>
          <div class="services-content">
            <h3><a href="/dokumen-daftar?kriteria=5">Kriteria 5</a></h3>
            <p>Keuangan, Sarana dan Prasarana</p>
          </div>
        </div>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <div class="services-item wow fadeInRight" data-wow-delay="1.5s">
          <div class="icon">
            <i class="lni-mobile"></i>
          </div>
          <div class="services-content">
            <h3><a href="/dokumen-daftar?kriteria=6">Kriteria 6</a></h3>
            <p>Pendidikan</p>
          </div>
        </div>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <div class="services-item wow fadeInRight" data-wow-delay="1.8s">
          <div class="icon">
            <i class="lni-rocket"></i>
          </div>
          <div class="services-content">
            <h3><a href="/dokumen-daftar?kriteria=7">Kriteria 7</a></h3>
            <p>Penelitian</p>
          </div>
        </div>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <div class="services-item wow fadeInRight" data-wow-delay="1.2s">
          <div class="icon">
            <i class="lni-layers"></i>
          </div>
          <div class="services-content">
            <h3><a href="/dokumen-daftar?kriteria=8">Kriteria 8</a></h3>
            <p>Pengabian Kepada Masyarakat</p>
          </div>
        </div>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <div class="services-item wow fadeInRight" data-wow-delay="1.5s">
          <div class="icon">
            <i class="lni-mobile"></i>
          </div>
          <div class="services-content">
            <h3><a href="/dokumen-daftar?kriteria=9">Kriteria 9</a></h3>
            <p>Luaran dan Capaian Tridharma</p>
          </div>
        </div>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <div class="services-item wow fadeInRight" data-wow-delay="1.8s">
          <div class="icon">
            <i class="lni-rocket"></i>
          </div>
          <div class="services-content">
            <h3><a href="/dokumen-daftar?kriteria=12">Analisi & Penetapan Program Pengembangan</a></h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Services Section End -->

<!-- About Section start -->
<div class="about-area section-padding bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-xs-12 info">
        <div class="about-wrapper wow fadeInLeft" data-wow-delay="0.3s">
          <div>
            <div class="site-heading">
              <p class="mb-3">Profil Tentang</p>
              <h2 class="section-title">Universitas Islam Negeri Sumatera Utara Medan</h2>
            </div>
            <div class="content">
              <p>
                Praesent imperdiet, tellus et euismod euismod, risus lorem euismod erat, at finibus neque odio quis metus. Donec vulputate arcu quam. Morbi quis tincidunt ligula. Sed rutrum tincidunt pretium. Mauris auctor, purus a pulvinar fermentum, odio dui vehicula lorem, nec pharetra justo risus quis mi. Ut ac ex sagittis, viverra nisl vel, rhoncus odio. 
              </p>
              <a href="/dokumen-daftar?kriteria=1" class="btn btn-common mt-3">Kunjungi </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-xs-12 wow fadeInRight" data-wow-delay="0.3s">
        <img class="img-fluid" src="assets/img/about/img-1.png" alt="" >
      </div>
    </div>
  </div>
</div>
<!-- About Section End -->

<!-- Features Section Start -->
<section id="features" class="section-padding">
  <div class="container">
    <div class="section-header text-center">          
      <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Awesome Features</h2>
      <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        <div class="content-left">
          <div class="box-item wow fadeInLeft" data-wow-delay="0.3s">
            <span class="icon">
              <i class="lni-rocket"></i>
            </span>
            <div class="text">
              <h4>Bootstrap 4 Based</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
          </div>
          <div class="box-item wow fadeInLeft" data-wow-delay="0.6s">
            <span class="icon">
              <i class="lni-laptop-phone"></i>
            </span>
            <div class="text">
              <h4>Fully Responsive</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
          </div>
          <div class="box-item wow fadeInLeft" data-wow-delay="0.9s">
            <span class="icon">
              <i class="lni-cog"></i>
            </span>
            <div class="text">
              <h4>HTML5, CSS3 & SASS</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        <div class="show-box wow fadeInUp" data-wow-delay="0.3s">
          <img src="assets/img/feature/intro-mobile.png" alt="">
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        <div class="content-right">
          <div class="box-item wow fadeInRight" data-wow-delay="0.3s">
            <span class="icon">
              <i class="lni-leaf"></i>
            </span>
            <div class="text">
              <h4>Modern Design</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
            </div>
          </div>
          <div class="box-item wow fadeInRight" data-wow-delay="0.6s">
            <span class="icon">
              <i class="lni-layers"></i>
            </span>
            <div class="text">
              <h4>Multi-purpose Template</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
          </div>
          <div class="box-item wow fadeInRight" data-wow-delay="0.9s">
            <span class="icon">
              <i class="lni-leaf"></i>
            </span>
            <div class="text">
              <h4>Working Contact Form</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Features Section End -->   
@endsection