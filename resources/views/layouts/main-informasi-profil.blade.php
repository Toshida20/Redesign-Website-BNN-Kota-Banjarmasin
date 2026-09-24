<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BNN')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<div class="profil-header">
    <div class="hashtags">
        #BNN #StopNarkoba #CegahNarkoba
    </div>
    <div class="media-social">
        <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
            <i class="fa-brands fa-facebook-f"></i>
        </a>
        <a href="https://www.twitter.com/" target="_blank" rel="noopener noreferrer" aria-label="Twitter" class="twitter">
            <i class="fa-brands fa-twitter"></i>
        </a>
        <a href="https://www.whatsapp.com/" target="_blank" rel="noopener noreferrer" aria-label="Whatsapp" class="whatsapp">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
        <a href="https://www.telegram.com/" target="_blank" rel="noopener noreferrer" aria-label="Telegram" class="telegram">
            <i class="fa-brands fa-telegram"></i>
        </a>
    </div>
    
    <div class="logo-company">
        <img src="{{ asset('images/logo-bnn.png') }}" alt="Logo BNN">
        <h1 class="title-company">Badan Narkotika Nasional</h1>
    </div>
</div>

<div class="hero-line-long"></div>

<div class="menu-slider-wrapper">
    <div class="menu-slider-container" id="menuSliderContainer">
        
        <div class="menu-slide">
            <div class="main-menu-1">
                <a href="{{ url('informasi-profil') }}" class="btn-menu {{ request()->is('informasi-profil') ? 'active' : '' }}">Sejarah</a>
                <a href="{{ url('visi-dan-misi') }}" class="btn-menu {{ request()->is('visi-dan-misi') ? 'active' : '' }}">Visi dan Misi</a>
                <a href="{{ url('tugas-dan-fungsi') }}" class="btn-menu {{ request()->is('tugas-dan-fungsi') ? 'active' : '' }}">Tugas dan Fungsi</a>
                <a href="{{ url('struktur') }}" class="btn-menu {{ request()->is('struktur') ? 'active' : '' }}">Struktur</a>
            </div>
        </div>
        
        <div class="menu-slide">
            <div class="main-menu-1">
                <a href="{{ url('alamat-kantor') }}" class="btn-menu {{ request()->is('alamat-kantor') ? 'active' : '' }}">Alamat Kantor</a>
                <a href="{{ url('alamat-kantor-bnnp-bnnk') }}" class="btn-menu {{ request()->is('alamat-kantor-bnnp-bnnk') ? 'active' : '' }}">Alamat Kantor BNNP dan BNNK</a>
                <a href="{{ url('lhkpn') }}" class="btn-menu {{ request()->is('lhkpn') ? 'active' : '' }}">LHKPN</a>
            </div>
        </div>

    </div>
</div>

<div class="indicator-menu-1">
    <div class="dot active" id="dot-1" onclick="switchMenu(1)"></div>
    <div class="dot" id="dot-2" onclick="switchMenu(2)"></div>
</div>
