<header id="header-wrap">
  <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
    <div class="container">
      <a href="/" class="navbar-brand"><img src="/img/logo.png" alt=""></a>       
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="lni-menu"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto w-100 justify-content-end clearfix">
          <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
            <a class="nav-link" href="/">
              Beranda
            </a>
          </li>
            <li class="nav-item {{ Request::is('daftar-dokumen*') ? 'active' : '' }}">
              <a class="nav-link" href="/daftar-dokumen">
                Laporan
              </a>
            </li>
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