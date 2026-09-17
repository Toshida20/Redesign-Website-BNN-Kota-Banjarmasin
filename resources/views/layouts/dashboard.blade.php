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

    <main class="py-4">

        @yield('content')

    </main>

</body>

</html>