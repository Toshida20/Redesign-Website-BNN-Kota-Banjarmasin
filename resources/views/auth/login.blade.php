<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Masuk - BNN Kota Banjarmasin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <div class="page-transition {{ $errors->any() ? '' : 'initial-cover' }}">
        <div class="transition-layer layer-1"></div>
        <div class="transition-layer layer-2"></div>
        <div class="transition-layer layer-3"></div>
    </div>

    <div class="split">
        <div class="split__left">
            <a href="{{ url('/') }}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <img src="{{ asset('images/background/gedung-bnnk.jpeg') }}" alt="Gedung BNN Kota Banjarmasin" class="hero-bg-img">
            <img src="{{ asset('images/assets/public/logo/logo-bnn.png') }}" alt="Logo BNN" class="hero-logo">
            <div class="hero-bottom">
                <h1>KOTA BANJARMASIN</h1>
                <p>Badan Narkotika Nasional Republik Indonesia</p>
                <div class="hero-line-login"></div>
            </div>
        </div>

        <div class="split__right">
            <div class="login-card {{ $errors->any() ? 'has-error' : '' }}">
                <img src="{{ asset('images/assets/public/logo/logo-bnn.png') }}" alt="Logo BNN" class="card-logo">

                <form method="POST" autocomplete="off" action="{{ route('login') }}">

                    @csrf

                    <label class="field-label">Nama Pengguna/Alamat Email</label>

                    <div class="input-wrap {{ $errors->any() ? 'input-error' : '' }}">
                        <span class="icon">
                            <i class="fa-solid fa-phone" style="transform: scaleX(-1);"></i>
                        </span>
                        <input type="email" name="email" autocomplete="off" placeholder="Masukkan Nama Pengguna/Email anda" value="{{ old('email') }}" {{ $errors->any() ? '' : 'autofocus' }}>
                    </div>

                    <label class="field-label">Password</label>

                   <div class="input-wrap {{ $errors->any() ? 'input-error' : '' }}">
                        <span class="icon">
                            <i class="fa-solid fa-phone" style="transform: scaleX(-1);"></i>
                        </span>
                        <input type="password" id="password" name="password" autocomplete="new-password" placeholder="Masukkan password anda">
                        <button type="button" class="eye-btn" id="togglePassword">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>

                @if ($errors->any())

                    <div class="alert-error">
                        Email atau password salah. Silakan coba lagi.
                    </div>

                @endif

                    <div class="remember-row">
                        <label><input type="checkbox" name="remember">Ingatkan Saya</label>
                        <a href="#" class="link">Lupa Password?</a>
                    </div>

                    <button type="submit" class="btn-masuk">Masuk</button>

                    <div class="register-link">
                        <a href="{{ route('register') }}">Belum Memiliki Akun?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>