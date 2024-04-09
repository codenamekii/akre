<!-- Header Area wrapper Starts -->
<header id="header-wrap">
  <!-- Navbar Start -->
  <nav>
    <div class="navbar">
      <i class='bx bx-menu'></i>
      <div class="logo"><a href="/"><img width="130vh" src="/img/logo.png"  alt=""></a></div>
      <div class="nav-links">
        <div class="sidebar-logo">
          <span class="logo-name">AIPT</span>
          <i class='bx bx-x' ></i>
        </div>
        <ul class="links">
          <li><a href="/">Beranda</a></li>
          <li>
            <a href="#">Mahasiswa</a>
            <i class='bx bxs-chevron-down htmlcss-arrow arrow'></i>
            <ul class="htmlCss-sub-menu sub-menu">
                <li class="more">
                    <span>
                        <a href="#">Calon Mahasiswa</a>
                        <i class='bx bxs-chevron-right arrow more-arrow'></i>
                    </span>
                    <ul class="more-sub-menu sub-menu">
                        <li><a href="/visualisasi/mahasiswa/calon-mahasiswa/S1">S1</a></li>
                        <li><a href="/visualisasi/mahasiswa/calon-mahasiswa/S2">S2</a></li>
                        <li><a href="/visualisasi/mahasiswa/calon-mahasiswa/S3">S3</a></li>
                        <li><a href="/visualisasi/mahasiswa/calon-mahasiswa/Profesi">Profesi</a></li>
                    </ul>
                </li>
                <li class="more">
                    <span>
                        <a href="#">Mahasiswa Baru</a>
                        <i class='bx bxs-chevron-right arrow more-arrow'></i>
                    </span>
                    <ul class="more-sub-menu sub-menu">
                        <li><a href="/visualisasi/mahasiswa/mahasiswa-baru/S1">S1</a></li>
                        <li><a href="/visualisasi/mahasiswa/mahasiswa-baru/S2">S2</a></li>
                        <li><a href="/visualisasi/mahasiswa/mahasiswa-baru/S3">S3</a></li>
                        <li><a href="/visualisasi/mahasiswa/mahasiswa-baru/Profesi">Profesi</a></li>
                    </ul>
                </li>
                <li class="more">
                    <span>
                        <a href="#">Mahasiswa Aktif</a>
                        <i class='bx bxs-chevron-right arrow more-arrow'></i>
                    </span>
                    <ul class="more-sub-menu sub-menu">
                        <li><a href="/visualisasi/mahasiswa/mahasiswa-aktif/S1">S1</a></li>
                        <li><a href="/visualisasi/mahasiswa/mahasiswa-aktif/S2">S2</a></li>
                        <li><a href="/visualisasi/mahasiswa/mahasiswa-aktif/S3">S3</a></li>
                        <li><a href="/visualisasi/mahasiswa/mahasiswa-aktif/Profesi">Profesi</a></li>
                    </ul>
                </li>
                <li class="more">
                    <span>
                        <a href="#">Mahasiswa Lulusan</a>
                        <i class='bx bxs-chevron-right arrow more-arrow'></i>
                    </span>
                    <ul class="more-sub-menu sub-menu">
                        <li><a href="/visualisasi/mahasiswa/mahasiswa-lulusan/S1">S1</a></li>
                        <li><a href="/visualisasi/mahasiswa/mahasiswa-lulusan/S2">S2</a></li>
                        <li><a href="/visualisasi/mahasiswa/mahasiswa-lulusan/S3">S3</a></li>
                        <li><a href="/visualisasi/mahasiswa/mahasiswa-lulusan/Profesi">Profesi</a></li>
                    </ul>
                </li>
                <li class="more">
                    <span>
                        <a href="#">Rasio Kelulusan</a>
                        <i class='bx bxs-chevron-right arrow more-arrow'></i>
                    </span>
                    <ul class="more-sub-menu sub-menu">
                        <li><a href="/visualisasi/mahasiswa/rasio-kelulusan/S1">S1</a></li>
                        <li><a href="/visualisasi/mahasiswa/rasio-kelulusan/S2">S2</a></li>
                        <li><a href="/visualisasi/mahasiswa/rasio-kelulusan/S3">S3</a></li>
                        <li><a href="/visualisasi/mahasiswa/rasio-kelulusan/Profesi">Profesi</a></li>
                    </ul>
                </li>
                <li><a href="/visualisasi/mahasiswa/mahasiswa-tugas-akhir">Mahasiswa Tugas Akhir</a></li>
                <li><a href="/visualisasi/mahasiswa/mahasiswa-asing">Mahasiswa Asing</a></li>
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
              <li><a href="/visualisasi/sdm/tendik">Tendik</a></li>
            </ul>
          </li>
          <li><a href="/visualisasi/akreditasi">Akreditasi</a></li>
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