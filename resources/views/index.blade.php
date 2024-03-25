@extends('layouts.main')

@section('content')
<!-- Hero Area Start -->

<div id="hero-area" class="hero-area-bg">
  <div class="container">      
    <div class="row">
      <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
        <div class="contents move-effect ">
          <h2 class="head-title wow fadeInRight" ata-wow-delay="0.3s">Selamat Datang di Website Pusat Data Akreditasi</h2>
          <p class=" wow fadeInRight" ata-wow-delay="0.3s">Pusat Data Bukti Fisik Pendukung Akreditasi Universitas Islam Negeri Sumatera Utara Medan</p>
          <div class="header-button wow fadeInRight" ata-wow-delay="0.5s">
            <form class="d-inline" action="/daftar-dokumen" method="get">
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
                <select class="form-select p2 bg-success text-light " name="tipe" id="" style="width: 60px;">
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
          </div>
          <div class="row wow fadeInRight" ata-wow-delay="0.7s">
            <div class="col-lg-3 col-6">
              <div class="stats-item text-center">
                <span id="kriteriaCounter" class="purecounter">0</span>
                <p>Kriteria</p>
              </div>
            </div><!-- End Stats Item -->
            <div class="col-lg-3 col-6">
              <div class="stats-item text-center">
                <span id="dokumenCounter" class="purecounter">0</span>
                <p>Dokumen</p>
              </div>
            </div><!-- End Stats Item -->
            <div class="col-lg-3 col-6">
              <div class="stats-item text-center">
                <span id="fakultasCounter" class="purecounter">0</span>
                <p>Fakultas/PPs</p>
              </div>
            </div><!-- End Stats Item -->
            <div class="col-lg-3 col-6">
              <div class="stats-item text-center">
                <span id="prodiCounter" class="purecounter">0</span>
                <p>Prodi</p>
              </div>
            </div><!-- End Stats Item -->
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
        <div class="intro-img wow fadeInRight" ata-wow-delay="0.8s">
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
        <a href="/daftar-dokumen?kriteria=10" >
        <div class="services-item bg-light wow fadeInRight" data-wow-delay="0.3s">
          <div class="icon">
            <i class="bi bi-globe2"></i>
          </div>
          <div class="services-content">
            <h3><a href="/daftar-dokumen?kriteria=10">Kondisi Eksternal</a></h3>
            <p>Donec tincidunt bibendum gravida. </p>
          </div>
        </div>
        </a>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <a href="/daftar-dokumen?kriteria=11" >
        <div class="services-item bg-light wow fadeInRight" data-wow-delay="0.6s">
          <div class="icon">
            <i class="bi bi-building-fill-gear"></i>
          </div>
          <div class="services-content">
            <h3><a href="/daftar-dokumen?kriteria=11">Profil Institusi</a></h3>
            <p>Donec tincidunt bibendum gravida. </p>
          </div>
        </div>
        </a>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <a href="/daftar-dokumen?kriteria=1" >
        <div class="services-item bg-light wow fadeInRight" data-wow-delay="0.9s">
          <div class="icon">
            <i class="bi bi-flag"></i>
          </div>
          <div class="services-content">
            <h3><a href="/daftar-dokumen?kriteria=1">Kriteria 1</a></h3>
            <p>Visi, Misi, Tujuan dan Startegi</p>
          </div>
        </div>
        </a>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <a href="/daftar-dokumen?kriteria=2" >
        <div class="services-item bg-light wow fadeInRight" data-wow-delay="1.2s">
          <div class="icon">
            <i class="bi bi-people"></i>
          </div>
          <div class="services-content">
            <h3><a href="/daftar-dokumen?kriteria=2">Kriteria 2</a></h3>
            <p>Tata Pamong, Tata Kelola, dan Kerja Sama</p>
          </div>
        </div>
        </a>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <a href="/daftar-dokumen?kriteria=3" >
        <div class="services-item bg-light wow fadeInRight" data-wow-delay="1.5s">
          <div class="icon">
            <i class="bi bi-mortarboard"></i>
          </div>
          <div class="services-content">
            <h3><a href="/daftar-dokumen?kriteria=3">Kriteria 3</a></h3>
            <p>Mahasisawa</p>
          </div>
        </div>
        </a>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <a href="/daftar-dokumen?kriteria=4" >
        <div class="services-item bg-light wow fadeInRight" data-wow-delay="1.8s">
          <div class="icon">
            <i class="bi bi-person-standing"></i>
          </div>
          <div class="services-content">
            <h3><a href="/daftar-dokumen?kriteria=4">Kriteria 4</a></h3>
            <p>Sumber Daya Manusia</p>
          </div>
        </div>
        </a>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <a href="/daftar-dokumen?kriteria=5" >
        <div class="services-item bg-light wow fadeInRight" data-wow-delay="1.2s">
          <div class="icon">
            <i class="bi bi-gear-wide-connected"></i>
          </div>
          <div class="services-content">
            <h3><a href="/daftar-dokumen?kriteria=5">Kriteria 5</a></h3>
            <p>Keuangan, Sarana dan Prasarana</p>
          </div>
        </div>
        </a>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <a href="/daftar-dokumen?kriteria=6" >
        <div class="services-item bg-light wow fadeInRight" data-wow-delay="1.5s">
          <div class="icon">
            <i class="bi bi-book-half"></i>
          </div>
          <div class="services-content">
            <h3><a href="/daftar-dokumen?kriteria=6">Kriteria 6</a></h3>
            <p>Pendidikan</p>
          </div>
        </div>
        </a>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <a href="/daftar-dokumen?kriteria=7" >
        <div class="services-item bg-light wow fadeInRight" data-wow-delay="1.8s">
          <div class="icon">
            <i class="bi bi-journal"></i>
          </div>
          <div class="services-content">
            <h3><a href="/daftar-dokumen?kriteria=7">Kriteria 7</a></h3>
            <p>Penelitian</p>
          </div>
        </div>
        </a>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <a href="/daftar-dokumen?kriteria=8" >
        <div class="services-item bg-light wow fadeInRight" data-wow-delay="1.2s">
          <div class="icon">
            <i class="bi bi-heart-pulse-fill"></i>
          </div>
          <div class="services-content">
            <h3><a href="/daftar-dokumen?kriteria=8">Kriteria 8</a></h3>
            <p>Pengabian Kepada Masyarakat</p>
          </div>
        </div>
        </a>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <a href="/daftar-dokumen?kriteria=9" >
        <div class="services-item bg-light wow fadeInRight" data-wow-delay="1.5s">
          <div class="icon">
            <i class="bi bi-trophy"></i>
          </div>
          <div class="services-content">
            <h3><a href="/daftar-dokumen?kriteria=9">Kriteria 9</a></h3>
            <p>Luaran dan Capaian Tridharma</p>
          </div>
        </div>
        </a>
      </div>
      <!-- Services item -->
      <div class="col-md-6 col-lg-4 col-xs-12">
        <a href="/daftar-dokumen?kriteria=12" >
        <div class="services-item bg-light wow fadeInRight" data-wow-delay="1.8s">
          <div class="icon">
            <i class="bi bi-graph-up-arrow"></i>
          </div>
          <div class="services-content">
            <h3><a href="/daftar-dokumen?kriteria=12">Analisi & Penetapan Program Pengembangan</a></h3>
          </div>
        </div>
        </a>
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
                UIN Sumatera Utara Medan, yang sering dikenal dengan singkatan UINSU, adalah sebuah lembaga pendidikan tinggi Islam yang berlokasi di Medan, Sumatera Utara. Keberadaan UINSU adalah suatu kebanggaan bagi kami semua, dan hal ini tercermin dalam berbagai aspek kehidupan kampus ini.UIN Sumatera Utara Medan memiliki 8 Fakultas dan 1 Program Pascasarjana. UINSU adalah kampus islam yang memiliki moto “Smart Islamic University”
              </p>
              <a href="https://uinsu.ac.id" class="btn btn-success mt-3">Kunjungi <i class="bi bi-chevron-double-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-xs-12 wow fadeInRight " data-wow-delay="0.3s">
        <img class="img-fluid" src="https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/uin-dan-blu-png-2.png" alt="" >
      </div>
    </div>
  </div>
</div>
<!-- About Section End -->

<!-- Features Section Start -->
<section id="features" class="section-padding">
  <div class="container">
    <div class="section-header text-center">          
      <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Visi & Misi</h2>
      <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        <div class="content-left">
          <div class="box-item wow bg-light fadeInLeft" data-wow-delay="0.3s">
            <span class="icon">
              <i class="lni-rocket"></i>
            </span>
            <div class="text">
              <h4>Integrasi Ilmu (Wahdatul 'Ulum)</h4>
              <p>Menciptakan ulul albab, cendekiawan yang ulama, dan kader bangsa yang menerapkan ilmunya untuk kemajuan Indonesia dan umat manusia.</p>
            </div>
          </div>
          <div class="box-item wow fadeInLeft" data-wow-delay="0.6s">
            <span class="icon">
              <i class="lni-laptop-phone"></i>
            </span>
            <div class="text">
              <h4>Pembangunan Peradaban</h4>
              <p>Menetapkan pusat keunggulan institusional dan fakultatif, sebagai kelanjutan dari Sumatera Utara sebagai 'titik nol' peradaban di Asia Tenggara.</p>
            </div>
          </div>
          <div class="box-item wow fadeInLeft" data-wow-delay="0.9s">
            <span class="icon">
              <i class="lni-cog"></i>
            </span>
            <div class="text">
              <h4>Moderasi Beragama</h4>
              <p>Menjadikan moderasi beragama sebagai sikap dasar bagi seluruh Sivitas Akademika, sehingga ilmu pengetahuan Islam membawa kebaikan bagi semua.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        <div class="show-box wow fadeInUp d-flex justify-content-center" data-wow-delay="0.3s">
          <img src="https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/03/bu-rektor-baru-Copy.png" width="450px" alt="">
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        <div class="content-right">
          <div class="box-item wow fadeInRight" data-wow-delay="0.3s">
            <span class="icon">
              <i class="lni-leaf"></i>
            </span>
            <div class="text">
              <h4>Peningkatan Kesejahteraan</h4>
              <p>Meningkatkan kesejahteraan seluruh Dosen dan karyawan Universitas melalui peningkatan grade remunerasi, pemberdayaan Badan Layanan Umum</p>
            </div>
          </div>
          <div class="box-item wow fadeInRight" data-wow-delay="0.6s">
            <span class="icon">
              <i class="lni-layers"></i>
            </span>
            <div class="text">
              <h4>Peningkatan Sarana</h4>
              <p>Terus-menerus meningkatkan kelengkapan sarana dan prasarana pembelajaran, berorientasi digital, riset yang bermanfaat bagi pembangunan</p>
            </div>
          </div>
          <div class="box-item wow fadeInRight" data-wow-delay="0.9s">
            <span class="icon">
              <i class="lni-leaf"></i>
            </span>
            <div class="text">
              <h4>Pengembangan Ilmu</h4>
              <p> maksimalisasi peran Indonesia dalam pembangunan peradaban sebagai kelanjutan logis dari Sumatera Utara sebagai ‘titik nol’ peradaban</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Features Section End -->   
<script>
  document.addEventListener('DOMContentLoaded', function() {
    function animateValue(id, start, end, duration) {
      if (start === end) return;
      var range = end - start;
      var current = start;
      var increment = end > start ? 1 : -1;
      var stepTime = Math.abs(Math.floor(duration / range));
      var obj = document.getElementById(id);
      var timer = setInterval(function() {
        current += increment;
        obj.innerText = current;
        if (current === end) {
          clearInterval(timer);
        }
      }, stepTime);
    }
  
    animateValue('kriteriaCounter', 0, 9, 2000);
    animateValue('dokumenCounter', 0, {{ $dokumenCount }}, 2000);
    animateValue('fakultasCounter', 0, 10, 2000);
    animateValue('prodiCounter', 0, 54, 2000);
  });
  </script>
@if (session()->has('success'))
<script>
  // Call the createToast function after the document has finished loading
  document.addEventListener("DOMContentLoaded", function() {
      createToast("success", "{{ session('success') }}");
  });
</script>
@elseif (session()->has('error'))
<script>
  // Call the createToast function after the document has finished loading
  document.addEventListener("DOMContentLoaded", function() {
      createToast("error", "{{ session('error') }}");
  });
</script>
@endif



@endsection