<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BNN')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
<div class="navigation-tab">
<nav class="navbar navbar-dark" style="background-color: #174b83;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img 
                id="bnn-logo"
                src="{{ asset('images/logo-bnn.png') }}" 
                alt="Logo BNN"
                width="30"
                height="30"
                class="me-2 logo-transition"
            >
            <span class="fw-bold" style="font-size: 12px; line-height: 1.2;">
                Badan Narkotika Nasional<br>
                Kota Banjarmasin
            </span>
        </a>
        
        <div class="d-flex align-items-center gap-3">
            <a href="https://bnn.go.id/" class="nav-link text-white menu-nav"><span>BNN Pusat</span></a>
            <a href="#" class="nav-link text-white menu-nav"><span>Informasi Publik (PPID)</span></a>
            <a href="#" class="nav-link text-white menu-nav"><span>Peraturan (JDIH)</span></a>
            <a href="#" class="nav-link text-white menu-nav"><span>Layanan Rehabilitasi (SIRENAP)</span></a>
            <a href="#" class="nav-link text-white menu-nav"><span>Perpustakaan Digital</span></a>
            <a href="#" class="nav-link text-white menu-nav"><span>Government Public Relations (GPR)</span></a>
            <a href="#" class="nav-link text-white menu-nav"><span>Toko Stop Narkoba</span></a>
        </div>
    </div>
</nav>

<nav class="navbar navbar-light navbar-second">
    <div class="container-fluid">
        <div class="navbar-right">
            <div class="menu-nav-2-container">
            <a href="{{ url('/') }}" class="menu-nav-2 {{ request()->is('/') ? 'active' : '' }}">
                <span>BERANDA</span>
            </a>

            <div class="nav-item-dropdown">
                <a href="#" class="menu-nav-2 {{ request()->is('organisasi') || request()->is('informasi-profil') || request()->is('kepala-bnnp-k-dari-masa-ke-masa') ? 'active' : '' }}">
                    <span>ORGANISASI</span>
                </a>
                <div class="dropdown-content">
                    <a href="{{ url('/informasi-profil') }}">Informasi Profil</a>
                    <a href="{{ url('/kepala-bnnp-k-dari-masa-ke-masa') }}">Kepala BNNK dari Masa Ke Masa</a>
                </div>
            </div>

            <div class="nav-item-dropdown">
                <a href="#" class="menu-nav-2 {{ request()->is('berita') ? 'active' : '' }}">
                    <span>BERITA</span>
                </a>
                <div class="dropdown-content">
                    <a href="#">Berita Utama</a>
                    <a href="#">Berita Kegiatan</a>
                    <a href="#">Foto</a>
                    <a href="#">Video</a>
                </div>
            </div>

            <div class="nav-item-dropdown">
                <a href="#" class="menu-nav-2 {{ request()->is('publikasi') ? 'active' : '' }}">
                    <span>PUBLIKASI</span>
                </a>
                <div class="dropdown-content">
                    <a href="#">Artikel</a>
                    <a href="#">Siaran Pers</a>
                </div>
            </div>

            <a href="#" class="menu-nav-2 {{ request()->is('kontak') ? 'active' : '' }}">
                <span>KONTAK</span>
            </a>

            <a href="https://boss.bnn.go.id/" class="menu-nav-2 {{ request()->is('layanan') ? 'active' : '' }}">
                <span>LAYANAN</span>
            </a>

            <a href="#" class="menu-nav-2 {{ request()->is('ppid') ? 'active' : '' }}">
                <span>PPID</span>
            </a>

            <a href="#" class="menu-nav-2 lapor {{ request()->is('lapor') ? 'active' : '' }}">
                <span>LAPOR</span>
            </a>
            </div>
        </div>
        
        <div class="login-user">
                <a href="#" clsss="dropdown-toggle">
                <div class="login-arrow">
                    <span>
                        <img src="{{ asset('images/down-arrow.png') }}" alt="Arrow Down" width="15" height="15">
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

<main>
    @yield('content')
</main>

@include('footer')

</body>
</html>
