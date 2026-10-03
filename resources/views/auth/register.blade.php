<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar - BNN Kota Banjarmasin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <div class="page-transition initial-cover">
        <div class="transition-layer layer-1"></div>
        <div class="transition-layer layer-2"></div>
        <div class="transition-layer layer-3"></div>
    </div>

    <div class="split">

        <div class="split__right register-side-left">
            <a href="{{ url('/login') }}" class="back-btn back-btn-dark">
                <i class="fa-solid fa-arrow-left"></i>
            </a>

            <div class="register-card">

                <form method="POST" autocomplete="off" action="{{ route('register') }}">
                    @csrf

                    <label class="field-label">Nama Pengguna</label>
                    <div class="input-wrap {{ $errors->has('name') ? 'input-error' : '' }}">
                        <span class="icon">
                            <i class="fa-solid fa-phone" style="transform: scaleX(-1);"></i>
                        </span>
                        <input type="text" name="name" placeholder="Masukkan Nama Pengguna anda" value="{{ old('name') }}" autofocus>
                    </div>

                    <label class="field-label">Email</label>
                    <div class="input-wrap {{ $errors->has('email') ? 'input-error' : '' }}">
                        <span class="icon">
                            <i class="fa-solid fa-phone" style="transform: scaleX(-1);"></i>
                        </span>
                        <input type="email" name="email" autocomplete="off" placeholder="Masukkan Email anda" value="{{ old('email') }}">
                    </div>

                    <label class="field-label">Password</label>
                    <div class="input-wrap {{ $errors->has('password') ? 'input-error' : '' }}">
                        <span class="icon">
                            <i class="fa-solid fa-phone" style="transform: scaleX(-1);"></i>
                        </span>
                        <input type="password" id="password" name="password" autocomplete="new-password" placeholder="Masukkan Password anda">
                        <button type="button" class="eye-btn">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>

                    <label class="field-label">Konfirmasi Password</label>
                    <div class="input-wrap {{ $errors->has('password_confirmation') ? 'input-error' : '' }}">
                        <span class="icon">
                            <i class="fa-solid fa-phone" style="transform: scaleX(-1);"></i>
                        </span>
                        <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password" placeholder="Masukkan Password anda">
                        <button type="button" class="eye-btn">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>

                    <div id="alert-container">
                        @if ($errors->any())
                            <div class="alert-error alert-visible" id="server-alert">
                                <ul style="margin: 0; padding-left: 18px; text-align: left;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="register-link text-right" style="text-align: right; margin-bottom: 20px;">
                        <a href="{{ route('login') }}">Sudah Memiliki Akun?</a>
                    </div>

                    <button type="submit" class="btn-masuk btn-register">Daftar</button>

                </form>
            </div>
        </div>

        <div class="split__left register-side-right">
            <img src="{{ asset('images/background/gedung-bnnk.jpeg') }}" alt="Gedung BNN Kota Banjarmasin" class="hero-bg-img">
            <img src="{{ asset('images/assets/public/logo/logo-bnn.png') }}" alt="Logo BNN" class="hero-logo">
            <div class="hero-bottom">
                <h1>KOTA BANJARMASIN</h1>
                <p>Badan Narkotika Nasional Republik Indonesia</p>
                <div class="hero-line-login"></div>
            </div>
        </div>
    </div>
</body>

</html>
