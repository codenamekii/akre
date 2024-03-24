<!-- Header Area wrapper Starts -->
<header id="header-wrap">
  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <a href="/" class="navbar-brand"><img src="https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/uin-dan-blu-png-2.png" alt=""></a>       
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="lni-menu"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto w-100 justify-content-end clearfix mb-3">
          <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
            <a class="nav-link" href="/">
              Beranda
            </a>
          </li>
          @if (Request::is('dokumen-daftar*'))
            <li class="nav-item active">
              <a class="nav-link" href="#">
                Laporan
              </a>
            </li>
          @else
            <li class="nav-item {{ Request::is('dokumen-hasil*') ? 'active' : '' }}">
              <a class="nav-link" href="/dokumen-hasil">
                Laporan
              </a>
            </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="/visualisasi">
              Visualisasi Data
            </a>
          </li>
          @if (Auth::user()->is_admin)
            <li class="nav-item {{ Request::is('admin*') ? 'active' : '' }}">
              <a class="nav-link" href="/admin">
                Admin
              </a>
            </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="/logout">
              Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->
</header>
<!-- Header Area wrapper End -->