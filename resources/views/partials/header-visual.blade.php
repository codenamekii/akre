<!-- Header Area wrapper Starts -->
<header id="header-wrap">
  <!-- Navbar Start -->
  <nav>
    <div class="navbar">
      <i class='bx bx-menu'></i>
      <div class="logo"><a href="/"><img width="130vh" src="/img/logo.png"  alt=""></a></div>
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
                  <li><a href="/visualisasi/calon-mahasiswa/s1">S1</a></li>
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
          @if (Auth::user()->is_admin)
            <li><a href="/admin">Admin</a></li>
          @endif
          <li><a href="/logout">Logout</a></li>
        </ul>
      </div>

    </div>
  </nav>
  <!-- Navbar End -->
</header>
<!-- Header Area wrapper End -->