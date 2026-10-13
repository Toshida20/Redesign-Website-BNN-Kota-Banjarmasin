<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kata Sandi Baru - BNN Kota Banjarmasin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

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
                    <p class="greeting"><strong>Buat Baru,</strong> <span class="text-blue">Kata Sandi</span></p>
                    <h2 class="welcome-title">Perbarui Kata Sandi<br>Akun Anda</h2>
                    <p style="font-size: 13px; color: #666; margin-top: 5px;">Silakan buat kata sandi baru untuk akun Anda.</p>
                </div>

                <form method="POST" autocomplete="off" action="{{ route('password.update') }}">
                    @csrf

                    {{-- Token Reset Password dari Link Email --}}
                    <input type="hidden" name="token" value="{{ $token }}">

                    <label class="field-label">Alamat Email</label>
                    <div class="input-wrap {{ $errors->has('email') ? 'input-error' : '' }}">
                        <span class="icon">
                            <i class="fa-solid fa-envelope"></i>
                        </span>
                        <input type="email" name="email" value="{{ old('email', $email) }}" readonly required style="background-color: #f1f5f9; cursor: not-allowed;">
                    </div>

                    <label class="field-label" style="margin-top: 10px;">Kata Sandi Baru</label>
                    <div class="input-wrap {{ $errors->has('password') ? 'input-error' : '' }}">
                        <span class="icon">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" id="new_password" name="password" autocomplete="new-password" placeholder="Minimal 8 karakter" autofocus required>
                        <button type="button" class="eye-btn" onclick="toggleVisibility('new_password', this)">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>

                    <label class="field-label" style="margin-top: 10px;">Konfirmasi Kata Sandi Baru</label>
                    <div class="input-wrap {{ $errors->has('password_confirmation') ? 'input-error' : '' }}">
                        <span class="icon">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password" placeholder="Ulangi kata sandi baru" required>
                        <button type="button" class="eye-btn" onclick="toggleVisibility('password_confirmation', this)">
                            <i class="fa-solid fa-eye"></i>
                        </button>
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

                    <button type="submit" class="btn-masuk" style="margin-top: 18px;">Simpan Sandi Baru</button>

                    <div class="register-link" style="margin-top: 18px;">
                        <a href="{{ route('login') }}">Batal dan Kembali ke Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleVisibility(inputId, btn) {
            const input = document.getElementById(inputId);
            const icon = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>
