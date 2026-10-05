<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Verifikasi Email - BNN Kota Banjarmasin</title>

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
            <a href="{{ route('register') }}" class="back-btn back-btn-dark">
                <i class="fa-solid fa-arrow-left"></i>
            </a>

            <div class="verify-card">
                <img src="{{ asset('images/assets/public/logo/logo-bnn.png') }}" alt="Logo BNN" class="card-logo">

                <p class="verify-text-info">Kode verifikasi telah dikirim ke alamat email</p>
                
                @php
                    $email = auth()->user()->email ?? '';
                    $parts = explode('@', $email);
                    $name = $parts[0];
                    $domain = $parts[1] ?? '';
                    
                    $visibleCount = 2;
                    if (strlen($name) > $visibleCount) {
                        $obfuscatedName = substr($name, 0, $visibleCount) . str_repeat('*', strlen($name) - $visibleCount);
                    } else {
                        $obfuscatedName = $name;
                    }
                    $obfuscatedEmail = $obfuscatedName . '@' . $domain;
                @endphp
                <div class="obfuscated-email">{{ $obfuscatedEmail }}</div>
                
                <p class="verify-text-desc">Silakan masukkan kode verifikasi yang<br>dikirim ke email Anda untuk melanjutkan</p>

                <form method="POST" action="{{ route('email.verify.code') }}" id="verifyForm">
                    @csrf
                    <div class="code-inputs">
                        <input type="text" name="code[]" maxlength="1" class="code-box {{ $errors->has('code') ? 'code-box-error' : '' }}" autofocus autocomplete="off">
                        <input type="text" name="code[]" maxlength="1" class="code-box {{ $errors->has('code') ? 'code-box-error' : '' }}" autocomplete="off">
                        <input type="text" name="code[]" maxlength="1" class="code-box {{ $errors->has('code') ? 'code-box-error' : '' }}" autocomplete="off">
                        <input type="text" name="code[]" maxlength="1" class="code-box {{ $errors->has('code') ? 'code-box-error' : '' }}" autocomplete="off">
                        <input type="text" name="code[]" maxlength="1" class="code-box {{ $errors->has('code') ? 'code-box-error' : '' }}" autocomplete="off">
                    </div>

                    @if ($errors->has('code'))
                        <div class="verify-error-msg">
                            {{ $errors->first('code') }}
                        </div>
                    @endif

                    @if (session('resent'))
                        <div class="verify-resent-msg">
                            {{ session('resent') }}
                        </div>
                    @endif

                    <div class="timer-container">
                        Kode berlaku selama <span id="countdown">01:59</span>
                    </div>

                    <button type="submit" class="btn-masuk btn-verify">Verifikasi Kode</button>

                    <div class="resend-link">
                        <span class="resend-text">Belum menerima kode?</span><br>
                        <a href="#" id="resendBtn" onclick="event.preventDefault(); document.getElementById('resendForm').submit();">Kirim ulang kode</a>
                    </div>
                </form>

                <form id="resendForm" method="POST" action="{{ route('email.resend.otp') }}" style="display: none;">
                    @csrf
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
