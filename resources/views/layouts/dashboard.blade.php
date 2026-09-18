<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'BNN')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
<div class="navigation-tab">

<nav class="navbar navbar-dark" style="background-color: #174b83;">
    <div class="container-fluid">

        <a class="navbar-brand d-flex align-items-center" href="#">
            <img 
                src="{{ asset('images/logo-bnn.png') }}" 
                alt="Logo BNN"
                width="30"
                height="30"
                class="me-2"
            >

            <span class="fw-bold" style="font-size: 12px; line-height: 1.2;">
                Badan Narkotika Nasional<br>
                Kota Banjarmasin
            </span>
        </a>
        
        <div class="d-flex align-items-center gap-3">

            <a href="#" class="nav-link text-white menu-nav">
                <span>BNN Pusat</span>
            </a>

            <a href="#" class="nav-link text-white menu-nav">
                <span>Informasi Publik (PPID)</span>
            </a>

            <a href="#" class="nav-link text-white menu-nav">
                <span>Peraturan (JDIH)</span>
            </a>

            <a href="#" class="nav-link text-white menu-nav">
                <span>Layanan Rehabilitasi (SIRENAP)</span>
            </a>

            <a href="#" class="nav-link text-white menu-nav">
                <span>Perpustakaan Digital</span>
            </a>

            <a href="#" class="nav-link text-white menu-nav">
                <span>Government Public Relations (GPR)</span>
            </a>

            <a href="#" class="nav-link text-white menu-nav">
                <span>Toko Stop Narkoba</span>
            </a>

        </div>
    </div>
</nav>
<nav class="navbar navbar-light navbar-second">
    <div class="container-fluid">
        <div class="navbar-right">
            <div class="menu-nav-2-container">
            <a href="#" class="menu-nav-2">
                <span>BERANDA</span>
            </a>

            <a href="#" class="menu-nav-2">
                <span>PROFIL</span>
            </a>

            <a href="#" class="menu-nav-2">
                <span>GALERI</span>
            </a>

            <a href="#" class="menu-nav-2">
                <span>BERITA</span>
            </a>

            <a href="#" class="menu-nav-2">
                <span>KONTAK</span>
            </a>

            <a href="#" class="menu-nav-2">
                <span>LAYANAN</span>
            </a>

            <a href="#" class="menu-nav-2">
                <span>PPID</span>
            </a>

            <a href="#" class="menu-nav-2 lapor">
                <span>LAPOR</span>
            </a>
            </div>
        </div>
        
        <div class="login-user">
                <a href="#" clsss="dropdown-toggle">
                <div class="login-arrow">
                    <span>
                        <image src="{{ asset('images/down-arrow.png') }}" alt="Arrow Down" width="15" height="15">
                    </span>
                </div>
                </a>

                <div class="login-text">
                    <small>Login Sebagai</small>
                    <strong>Tamu</strong>
                </div>

                <a href="#" clsss="profile-link">
                <div class="user-icon">
                    <i class="bi bi-person-circle"></i>
                </div>
                </a>
            </div>
        </div>    
    </nav>
</div>

<div class="pembatas"></div>

<section class="hero-video">
    
    <video autoplay muted loop playsinline class="background-video">
        <source src="{{ asset('videos/bg-dna.mp4') }}" type="video/mp4">
    </video>

    <div class="video-overlay"></div>

    <div class="hero-content">
        <image src="{{ asset('images/logo-bnn.png') }}" alt="Logo BNN" width="190" height="190" class="mb-4">
        <p>Badan Narkotika Nasional Republik Indonesia</p>
        <h1>Kota Banjarmasin</h1>
        <div class="hero-line"></div>
    </div>
</section>

<div class="our-services">
    <h1>Kami Melayani</h1>
    <div class="service-container">
        <div class="click-service">
            <div class="service-card">
                <div class="service-icon">
                    <image src="{{ asset('images/icon-surat.png') }}"
                         alt="Icon Surat"
                         width="60"
                         height="60">
                </div>
                <h5>
                    Pembuatan Surat Keterangan Hasil Pemeriksaan Narkotika (SKHPN)
                </h5>
            </div>
        </div>
        <div class="click-service">
            <div class="service-card">
                <div class="service-icon">
                    <image src="{{ asset('images/icon-public.png') }}"
                         alt="Icon Public"
                         width="60"
                         height="60">
                </div>
                <h5>
                    Permohonan Sosialisasi P4GN
                </h5>
            </div>
        </div>
        <div class="click-service">
            <div class="service-card">
                <div class="service-icon">
                    <image src="{{ asset('images/icon-pengaduan.png') }}"
                         alt="Icon Pengaduan"
                         width="60"
                         height="60">
                </div>
                <h5>
                    Layanan Pengaduan Masyarakat Mengenai P4GN
                </h5>
            </div>
        </div>
        <div class="click-service">
            <div class="service-card">
                <div class="service-icon">
                    <image src="{{ asset('images/icon-rehabilitas.png') }}"
                         alt="Icon Rehabilitasi"
                         width="60"
                         height="60">
                </div>
                <h5>
                    Informasi Seputar Rehabilitasi
                </h5>
            </div>
        </div>
    </div>
</div>

<div class="kegiatan-kami" data-kegiatan='[
    {"image":"/images/kegiatan/deteksi-dini-supir.jpeg",
        "title":"Deteksi Dini Soppir Angkutan Dalam Rangka Arus Mudik",
            "description":"Kegiatan Deteksi Dini Sopir Angkutan dalam Rangka Arus Mudik merupakan pemeriksaan kesehatan bagi sopir angkutan umum menjelang masa mudik, meliputi cek tekanan darah, gula darah, dan kondisi fisik lainnya. Kegiatan ini bertujuan memastikan sopir dalam keadaan sehat dan siap mengemudi, guna mencegah kecelakaan akibat kelelahan atau gangguan kesehatan selama perjalanan mudik."},
    {"image":"/images/kegiatan/jumat-bersinar-smpn3.jpg",
        "title":"Jumat Bersinar di SMPN 3 Banjarmasin",
            "description":"Kegiatan edukasi dan sosialisasi bahaya narkoba kepada para siswa SMPN 3 Banjarmasin. Diharapkan dengan kegiatan ini, para pelajar dapat menjauhi narkoba dan fokus pada pendidikan mereka untuk masa depan yang lebih baik."},
    {"image":"/images/kegiatan/rapat.jpeg",
        "title":"Rapat Koordinasi BNN Kota Banjarmasin",
            "description":"Rapat koordinasi rutin yang diselenggarakan oleh BNN Kota Banjarmasin guna membahas strategi dan evaluasi program Pencegahan dan Pemberantasan Penyalahgunaan dan Peredaran Gelap Narkotika (P4GN) di wilayah Kota Banjarmasin."},
    {"image":"/images/kegiatan/jumat-bersinar-smpn3-foto2.jpeg",
        "title":"Pelayanan Terpadu Keliling",
            "description":"Pelayanan Terpadu Keliling Mobil Bungas BNN Kota Banjarmasin dalam rangka memberikan layanan informasi dan konsultasi kepada masyarakat luas secara langsung dan mudah dijangkau."}]'>
    
    <div id="kegiatan-bg" class="kegiatan-bg"></div>
    <div class="kegiatan-overlay"></div>
    
    <div class="kegiatan-wrapper">
        <div class="kegiatan-row">
            
            <div class="kegiatan-col-left">
                <button id="slider-up" class="slider-btn slider-btn-up">
                    <img src="{{ asset('images/arrow.png') }}" alt="Arrow Up">
                </button>
                
                <div id="activity-slider-images" class="slider-images-container"></div>

                <button id="slider-down" class="slider-btn slider-btn-down">
                    <img src="{{ asset('images/arrow.png') }}" alt="Arrow Down">
                </button>
            </div>
            
            <div class="kegiatan-col-right">
                <h1 class="kegiatan-title">Kegiatan Kami</h1>
                
                <div class="kegiatan-text-wrapper">
                    <h4 id="activity-title" class="transition-text kegiatan-subtitle"></h4>
                    <p id="activity-desc" class="transition-text kegiatan-desc"></p>
                </div>
            </div>
        </div>
    </div>
</div>

    <main class="py-4">

        @yield('content')

    </main>

</body>

</html>