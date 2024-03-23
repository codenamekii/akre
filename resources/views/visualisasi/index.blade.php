<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ isset($title) ? $title . ' | ' . config('app.name') : config('app.name') }}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Icon -->
    <link rel="stylesheet" href="{{ asset('fonts/line-icons.css') }}">

    <!-- Owl carousel -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nivo-lightbox.css') }}">
    <!-- Animate -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('css/visual.css') }}">
    <!-- Responsive Style -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

</head>
  <body>

    <!-- Header Area wrapper Starts -->
    <header id="header-wrap">
      <!-- Navbar Start -->
      <nav>
        <div class="navbar">
          <i class='bx bx-menu'></i>
          <div class="logo"><a href="#"><img width="130vh" src="https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/uin-dan-blu-png-2.png"  alt=""></a></div>
          <div class="nav-links">
            <div class="sidebar-logo">
              <span class="logo-name">CodingLab</span>
              <i class='bx bx-x' ></i>
            </div>
            <ul class="links">
              <li><a href="/">Beranda</a></li>
              <li>
                <a href="#">Mahasiswa</a>
                <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
                <ul class="htmlCss-sub-menu sub-menu">
                  <li class="more">
                    <span>
                      <a href="#">Calon Mahasisawa</a>
                      <i class='bx bxs-chevron-right arrow more-arrow'></i>
                    </span>
                    <ul class="more-sub-menu sub-menu">
                      <li><a href="#">S1</a></li>
                      <li><a href="#">S2</a></li>
                      <li><a href="#">S3</a></li>
                      <li><a href="#">Profesi</a></li>
                    </ul>
                  </li>
                  <li class="more">
                    <span>
                      <a href="#">Mahasisawa Baru</a>
                      <i class='bx bxs-chevron-right arrow more-arrow'></i>
                    </span>
                    <ul class="more-sub-menu sub-menu">
                      <li><a href="#">S1</a></li>
                      <li><a href="#">S2</a></li>
                      <li><a href="#">S3</a></li>
                      <li><a href="#">Profesi</a></li>
                    </ul>
                  </li>
                  <li class="more">
                    <span>
                      <a href="#">Mahasisawa Aktif</a>
                      <i class='bx bxs-chevron-right arrow more-arrow'></i>
                    </span>
                    <ul class="more-sub-menu sub-menu">
                      <li><a href="#">S1</a></li>
                      <li><a href="#">S2</a></li>
                      <li><a href="#">S3</a></li>
                      <li><a href="#">Profesi</a></li>
                    </ul>
                  </li>
                  <li class="more">
                    <span>
                      <a href="#">Mahasisawa Lulusan</a>
                      <i class='bx bxs-chevron-right arrow more-arrow'></i>
                    </span>
                    <ul class="more-sub-menu sub-menu">
                      <li><a href="#">S1</a></li>
                      <li><a href="#">S2</a></li>
                      <li><a href="#">S3</a></li>
                      <li><a href="#">Profesi</a></li>
                    </ul>
                  </li>
                  <li class="more">
                    <span>
                      <a href="#">Rasio Kelulusan</a>
                      <i class='bx bxs-chevron-right arrow more-arrow'></i>
                    </span>
                    <ul class="more-sub-menu sub-menu">
                      <li><a href="#">S1</a></li>
                      <li><a href="#">S2</a></li>
                      <li><a href="#">S3</a></li>
                      <li><a href="#">Profesi</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Mahasiswa Tugas Akhir</a></li>
                  <li><a href="#">Mahasiswa Asing</a></li>
                </ul>
              </li>

              <li>
                <a href="#">SDM</a>
                <i class='bx bxs-chevron-down js-arrow arrow '></i>
                <ul class="js-sub-menu sub-menu">
                  <li class="more">
                    <span>
                      <a href="#">Dosen</a>
                      <i class='bx bxs-chevron-right arrow more-arrow'></i>
                    </span>
                    <ul class="more-sub-menu sub-menu">
                      <li><a href="#">Per Homebase</a></li>
                      <li><a href="#">Per Jabatan Akademik</a></li>
                      <li><a href="#">Per Pendidikan Akhir</a></li>
                      <li><a href="#">Per Status Sertifikasi</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Tendik</a></li>
                </ul>
              </li>
              <li><a href="#">Akreditasi</a></li>
              <li><a href="#">Pusat Data Akreditasi</a></li>
            </ul>
          </div>

        </div>
      </nav>
      <!-- Navbar End -->

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


    </header>
    <!-- Header Area wrapper End -->

    <!-- Footer Section Start -->
    <footer id="footer" class="footer-area section-padding">
      <div id="copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="copyright-content">
                <p>Copyright © 2024 <a rel="nofollow" href="#">Pustipada</a> All Right Reserved</p>
              </div>
            </div>
          </div>
        </div>
      </div>   
    </footer> 
    <!-- Footer Section End -->

    <!-- Go to Top Link -->
    <a href="#" class="back-to-top">
    	<i class="bi bi-caret-up-fill"></i>
    </a>
    
    <!-- Preloader -->
    <div id="preloader">
      <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script src="{{ asset('js/jquery-min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/wow.js') }}"></script>
  <script src="{{ asset('js/jquery.nav.js') }}"></script>
  <script src="{{ asset('js/scrolling-nav.js') }}"></script>
  <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>      
  <script src="{{ asset('js/waypoints.min.js') }}"></script>   
  <script src="{{ asset('js/main.js') }}"></script>
  <script src="{{ asset('js/visual.js') }}"></script>
  


  </body>
</html>
