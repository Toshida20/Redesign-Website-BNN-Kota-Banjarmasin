<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Verifikasi Berhasil - BNN Kota Banjarmasin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script>
        if (sessionStorage.getItem('is_internal_nav') === 'true') {
            document.documentElement.classList.add('internal-nav');
        }
    </script>
</head>

<body>
    <div class="page-transition initial-cover">
        <div class="transition-layer layer-1"></div>
        <div class="transition-layer layer-2"></div>
        <div class="transition-layer layer-3"></div>
    </div>

    <div class="split">

        <div class="split__right register-side-left">
            <a href="{{ route('verify.complete') }}" class="back-btn back-btn-dark">
                <i class="fa-solid fa-arrow-left"></i>
            </a>

            <div class="verify-card verify-success-card">
                <div class="success-icon-wrapper">
                    <div class="success-icon-circle">
                        <i class="fa-solid fa-check"></i>
                    </div>
                </div>

                <h2 class="verify-success-title">Verifikasi Berhasil</h2>

                <a href="{{ route('verify.complete') }}" class="btn-masuk btn-verify btn-kembali">Kembali</a>
            </div>
        </div>

        <div class="split__left register-side-right">
            <img src="{{ asset('images/background/gedung-bnnk.jpeg') }}" alt="Gedung BNN Kota Banjarmasin" class="hero-bg-img">
            <img src="{{ asset('images/assets/public/logo/bnn-250x250.avif') }}" alt="Logo BNN" class="hero-logo">
            <div class="hero-bottom">
                <h1>KOTA BANJARMASIN</h1>
                <p>Badan Narkotika Nasional Republik Indonesia</p>
                <div class="hero-line-login"></div>
            </div>
        </div>
    </div>

</body>
</html>
