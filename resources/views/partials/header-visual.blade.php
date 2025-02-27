<div class="loader-container" id="loader-container">
    <div class="loader"></div>
    <div class="text-loader">FT-UIM</div>
</div>

<header id="header-wrap">
    <!-- Navbar Start -->
    <nav>
        <div class="navbar">
            <div class="logo">
                <a href="#">
                    <img src="/img/logo teknik.png" alt="" width="50px" height="50px">
                </a>
            </div>
            <i class="bx bx-menu menu-icon"></i>
            <div class="nav-links">

                <ul class="links">
                    <li><a class="link" href="/">Beranda</a></li>
                    <li><a class="link" href="/visualisasi">Visualisasi Data</a></li>
                    <li>
                        <a class="link" href="#">Mahasiswa</a>
                        <i class='bx bxs-chevron-down htmlcss-arrow arrow'></i>
                        <ul class="htmlCss-sub-menu sub-menu">
                            <li class="more">
                                <span>
                                    <a href="#">Calon Mahasiswa</a>
                                    <i class='bx bxs-chevron-right arrow more-arrow'></i>
                                </span>
                                <ul class="more-sub-menu sub-menu">
                                    <li><a href="/visualisasi/mahasiswa/calon-mahasiswa/S1">S1</a></li>
                                </ul>
                            </li>
                            <li class="more">
                                <span>
                                    <a href="#">Mahasiswa Baru</a>
                                    <i class='bx bxs-chevron-right arrow more-arrow'></i>
                                </span>
                                <ul class="more-sub-menu sub-menu">
                                    <li><a href="/visualisasi/mahasiswa/mahasiswa-baru/S1">S1</a></li>
                                </ul>
                            </li>
                            <li class="more">
                                <span>
                                    <a href="#">Mahasiswa Aktif</a>
                                    <i class='bx bxs-chevron-right arrow more-arrow'></i>
                                </span>
                                <ul class="more-sub-menu sub-menu">
                                    <li><a href="/visualisasi/mahasiswa/mahasiswa-aktif/S1">S1</a></li>
                                </ul>
                            </li>
                            <li class="more">
                                <span>
                                    <a href="#">Mahasiswa Lulusan</a>
                                    <i class='bx bxs-chevron-right arrow more-arrow'></i>
                                </span>
                                <ul class="more-sub-menu sub-menu">
                                    <li><a href="/visualisasi/mahasiswa/mahasiswa-lulusan/S1">S1</a></li>
                                </ul>
                            </li>
                            <li class="more">
                                <span>
                                    <a href="#">Rasio Kelulusan</a>
                                    <i class='bx bxs-chevron-right arrow more-arrow'></i>
                                </span>
                                <ul class="more-sub-menu sub-menu">
                                    <li><a href="/visualisasi/mahasiswa/rasio-kelulusan/S1">S1</a></li>
                                </ul>
                            </li>
                            <li><a href="/visualisasi/mahasiswa/mahasiswa-tugas-akhir">Mahasiswa Tugas Akhir</a></li>
                            <li><a href="/visualisasi/mahasiswa/mahasiswa-asing">Mahasiswa Asing</a></li>
                        </ul>
                    </li>


                    <li>
                        <a class="link" href="#">SDM</a>
                        <i class='bx bxs-chevron-down js-arrow arrow '></i>
                        <ul class="js-sub-menu sub-menu">
                            <li class="more">
                                <span>
                                    <a href="#">Dosen</a>
                                    <i class='bx bxs-chevron-right arrow more-arrow'></i>
                                </span>
                                <ul class="more-sub-menu sub-menu">
                                    <li><a href="/visualisasi/sdm/dosen/per-homebase">Per Homebase</a></li>
                                    <li><a href="/visualisasi/sdm/dosen/per-jabatan">Per Jabatan Akademik</a></li>
                                    <li><a href="/visualisasi/sdm/dosen/per-pendidikan">Per Pendidikan Akhir</a></li>
                                    <li><a href="/visualisasi/sdm/dosen/per-sertifikasi">Per Status Sertifikasi</a></li>
                                    <li><a href="/visualisasi/sdm/dosen/per-tidak-tetap">Tidak Tetap</a></li>
                                </ul>
                            </li>
                            <li><a href="/visualisasi/sdm/tendik">Tendik</a></li>
                        </ul>
                    </li>
                    <li><a class="link" href="/visualisasi/akreditasi">Akreditasi</a></li>
                    @auth
                        @if (Auth::user()->is_admin)
                            <li><a class="link" href="/admin">Admin</a></li>
                        @else
                            <li><a class="link" href="/logout">Logout</a></li>
                        @endif
                    @endauth
                </ul>
            </div>

        </div>
    </nav>
    <!-- Navbar End -->
</header>


<script>
    const menuIcon = document.querySelector(".bx-menu");
    const navLinks = document.querySelector(".nav-links");
    const links = document.querySelectorAll(".links li");

    menuIcon.addEventListener("click", function() {
        navLinks.classList.toggle("active");
        links.forEach(link => link.nextElementSibling.style.display = navLinks.classList.contains("active") ?
            "block" : "none");
    });

    window.addEventListener("scroll", function() {
        var header_navbar = document.querySelector(".navbar");
        var sticky = header_navbar.offsetTop;

        if (window.pageYOffset > sticky) {
            header_navbar.classList.add("sticky");
        } else {
            header_navbar.classList.remove("sticky");
        }
    });


    window.addEventListener("DOMContentLoaded", function() {
        const loaderContainer = document.getElementById("loader-container");
        loaderContainer.classList.add("show");
        setTimeout(function() {
            loaderContainer.classList.remove("show");
            loaderContainer.style.display = "none";
        }, 2000);
    });

    window.addEventListener("load", function() {
        setTimeout(function() {
            const loaderContainer = document.getElementById("loader-container");
            loaderContainer.classList.remove("show");
            loaderContainer.style.display = "none";
        }, 2000);
    });


</script>
