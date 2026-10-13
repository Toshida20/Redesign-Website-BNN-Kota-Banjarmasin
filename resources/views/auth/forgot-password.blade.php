<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lupa Kata Sandi - BNN Kota Banjarmasin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<script>
        if (sessionStorage.getItem('is_internal_nav') === 'true') {
            document.documentElement.classList.add('internal-nav');
        }
    </script>
</head>

<body>
    <div class="page-transition {{ $errors->any() ? '' : 'initial-cover' }}">
        <div class="transition-layer layer-1"></div>
        <div class="transition-layer layer-2"></div>
        <div class="transition-layer layer-3"></div>
    </div>

<body>
    <div class="split">
        <div class="split__left">
            <a href="{{ route('login') }}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <img src="{{ asset('images/background/gedung-bnnk.jpeg') }}" alt="Gedung BNN Kota Banjarmasin" class="hero-bg-img">
            <img src="{{ asset('images/assets/public/logo/bnn-250x250.avif') }}" alt="Logo BNN" class="hero-logo">
            <div class="hero-bottom">
                <h1>KOTA BANJARMASIN</h1>
                <p>Badan Narkotika Nasional Republik Indonesia</p>
                <div class="hero-line-login"></div>
            </div>
        </div>

        <div class="split__right">
            <div class="login-card {{ $errors->any() ? 'has-error' : '' }}">
                <div class="login-header-text">
                    <h2 class="welcome-title" style="margin-top: 55px;">Lupa Kata Sandi<br>Akun Anda?</h2>
                    <p style="font-size: 13px; color: #666; margin-top: 10px; line-height: 1.5;">Masukkan email akun Anda. Kami akan mengirimkan link tautan untuk mengatur ulang kata sandi.</p>
                </div>

                <form method="POST" autocomplete="off" action="{{ route('password.email') }}">
                    @csrf

                    <label class="field-label">Alamat Email</label>
                    <div class="input-wrap {{ $errors->has('email') ? 'input-error' : '' }}">
                        <span class="icon">
                            <i class="fa-solid fa-envelope"></i>
                        </span>
                        <input type="email" name="email" autocomplete="off" placeholder="Masukkan Email anda" value="{{ old('email') }}" autofocus required>
                    </div>

                    <div id="alert-container">
                        @if (session('status'))
                            <div class="alert-success alert-visible" id="success-alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert-error alert-visible" id="server-alert">
                                {{ $errors->first() }}
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn-masuk" style="margin-top: 30px; padding: 8px 22px; width: auto; font-size: 13px;">Kirim Link Reset Sandi</button>

                    <div class="register-link" style="margin-top: 18px;">
                        <a href="{{ route('login') }}">Ingat kata sandi?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
