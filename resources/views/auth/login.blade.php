<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @php
        $isRegisterMode = (isset($initialMode) && $initialMode === 'register')
            || request()->routeIs('register')
            || old('name')
            || $errors->has('name')
            || $errors->has('password_confirmation');
    @endphp

    <title id="authPageTitle">{{ $isRegisterMode ? 'Daftar - BNN Kota Banjarmasin' : 'Masuk - BNN Kota Banjarmasin' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <div class="split auth-split-viewport {{ $isRegisterMode ? 'mode-register' : 'mode-login' }}" id="authSplitContainer">
        
        <a href="{{ url('/') }}" class="back-btn {{ $isRegisterMode ? 'back-btn-dark' : '' }}" id="authBackBtn">
            <i class="fa-solid fa-arrow-left"></i>
        </a>

        <div class="split__left split-hero-panel split-hero-left" id="splitHeroLeft">
            <img src="{{ asset('images/background/gedung-bnnk.jpeg') }}" alt="Gedung BNN Kota Banjarmasin" class="hero-bg-img">
            <img src="{{ asset('images/assets/public/logo/bnn-250x250.avif') }}" alt="Logo BNN" class="hero-logo">
            <div class="hero-bottom">
                <h1>KOTA BANJARMASIN</h1>
                <p>Badan Narkotika Nasional Republik Indonesia</p>
                <div class="hero-line-login"></div>
            </div>
        </div>

        <div class="split__left split-hero-panel split-hero-right" id="splitHeroRight">
            <img src="{{ asset('images/background/gedung-bnnk.jpeg') }}" alt="Gedung BNN Kota Banjarmasin" class="hero-bg-img">
            <img src="{{ asset('images/assets/public/logo/bnn-250x250.avif') }}" alt="Logo BNN" class="hero-logo">
            <div class="hero-bottom">
                <h1>KOTA BANJARMASIN</h1>
                <p>Badan Narkotika Nasional Republik Indonesia</p>
                <div class="hero-line-login"></div>
            </div>
        </div>

        <!-- LAYER 3 (Paling Belakang) -->
        <div class="split-slider-layer layer-3" id="splitLayer3"></div>

        <!-- LAYER 2 (Layer ke-2) -->
        <div class="split-slider-layer layer-2" id="splitLayer2"></div>

        <!-- LAYER 1 (Paling Depan) -->
        <div class="split-slider-layer layer-1" id="splitLayer1">
            <div class="split-card-stage">

                <!-- CARD LOGIN -->
                <div class="login-card auth-card {{ $errors->any() && !$isRegisterMode ? 'has-error' : '' }}" id="loginCard" style="{{ $isRegisterMode ? 'display: none;' : '' }}">
                    <div class="login-header-text">
                        <p class="greeting"><strong>Halo,</strong> <span class="text-blue">Selamat Datang</span></p>
                        <h2 class="welcome-title">Silahkan Masuk ke<br>Akun Anda</h2>
                    </div>

                    <form method="POST" autocomplete="off" action="{{ route('login') }}" id="loginForm">
                        @csrf

                        <label class="field-label">Alamat Email</label>
                        <div class="input-wrap {{ $errors->any() && !$isRegisterMode ? 'input-error' : '' }}">
                            <span class="icon">
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                            <input type="email" name="email" autocomplete="off" placeholder="Masukkan Email anda" value="{{ old('email') }}" {{ !$isRegisterMode && !$errors->any() ? 'autofocus' : '' }}>
                        </div>

                        <label class="field-label">Password</label>
                        <div class="input-wrap {{ $errors->any() && !$isRegisterMode ? 'input-error' : '' }}">
                            <span class="icon">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input type="password" id="password" name="password" autocomplete="old-password" placeholder="Masukkan password anda">
                            <button type="button" class="eye-btn" id="togglePassword">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>

                        <div id="alert-container">
                            @if (session('status'))
                                <div class="alert-success alert-visible" id="success-alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if ($errors->any() && !$isRegisterMode)
                                <div class="alert-error alert-visible" id="server-alert">
                                    Email atau password salah. Silakan coba lagi.
                                </div>
                            @endif
                        </div>

                        <div class="remember-row">
                            <label><input type="checkbox" name="remember">Ingatkan Saya</label>
                            <a href="{{ route('password.request') }}" class="link">Lupa Password?</a>
                        </div>

                        <button type="submit" class="btn-masuk">Masuk</button>

                        <div class="register-link">
                            <a href="{{ route('register') }}" id="btnToRegister">Belum Memiliki Akun?</a>
                        </div>
                    </form>
                </div>

                <!-- CARD REGISTER -->
                <div class="register-card auth-card {{ $errors->any() && $isRegisterMode ? 'has-error' : '' }}" id="registerCard" style="{{ !$isRegisterMode ? 'display: none;' : '' }}">
                    <form method="POST" autocomplete="off" action="{{ route('register') }}" id="registerForm">
                        @csrf

                        <label class="field-label">Nama Pengguna</label>
                        <div class="input-wrap {{ $errors->has('name') ? 'input-error' : '' }}">
                            <span class="icon">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <input type="text" name="name" placeholder="Masukkan Nama Pengguna anda" value="{{ old('name') }}">
                        </div>

                        <label class="field-label">Email</label>
                        <div class="input-wrap {{ $errors->has('email') ? 'input-error' : '' }}">
                            <span class="icon">
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                            <input type="email" name="email" autocomplete="off" placeholder="Masukkan Email anda" value="{{ old('email') }}">
                        </div>

                        <label class="field-label">Password</label>
                        <div class="input-wrap {{ $errors->has('password') ? 'input-error' : '' }}">
                            <span class="icon">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input type="password" id="reg_password" name="password" autocomplete="new-password" placeholder="Masukkan Password anda">
                            <button type="button" class="eye-btn">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>

                        <label class="field-label">Konfirmasi Password</label>
                        <div class="input-wrap {{ $errors->has('password_confirmation') ? 'input-error' : '' }}">
                            <span class="icon">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input type="password" id="reg_password_confirmation" name="password_confirmation" autocomplete="new-password" placeholder="Masukkan Password anda">
                            <button type="button" class="eye-btn">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>

                        <div id="alert-container-reg">
                            @if ($errors->any() && $isRegisterMode)
                                <div class="alert-error alert-visible" id="server-alert-reg">
                                    <ul style="margin: 0; padding-left: 18px; text-align: center;">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <div class="register-link text-right" style="text-align: right; margin-bottom: 20px;">
                            <a href="{{ route('login') }}" id="btnToLogin">Sudah Memiliki Akun?</a>
                        </div>

                        <button type="submit" class="btn-masuk btn-register">Buat Akun</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>