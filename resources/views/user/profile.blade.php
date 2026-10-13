<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kelola Profil - BNN Kota Banjarmasin</title>

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
    <div class="page-transition {{ $errors->any() ? '' : 'initial-cover' }}">
        <div class="transition-layer layer-1"></div>
        <div class="transition-layer layer-2"></div>
        <div class="transition-layer layer-3"></div>
    </div>

    <div class="profile-bg-wrapper">
        <img src="{{ asset('images/background/gedung-bnnk.jpeg') }}" alt="Gedung BNN Kota Banjarmasin" class="profile-bg-img">
        <div class="profile-bg-overlay"></div>
    </div>

    <div class="top-nav-bar">
        <a href="{{ url('/') }}" class="back-round-btn" title="Kembali ke Beranda">
            <i class="fa-solid fa-arrow-left"></i>
        </a>

        <div class="brand-header-right">
            <img src="{{ asset('images/assets/public/logo/bnn-250x250.avif') }}" alt="Logo BNN">
            <div class="brand-text">
                <strong>Badan Narkotika Nasional</strong>
                <span>Kota Banjarmasin</span>
            </div>
        </div>
    </div>

    <!-- Card Flip Area -->
    <div class="profile-center-container">
        <div class="flip-card-wrapper">
            <div class="flip-card-inner" id="cardFlipper">

                <!-- card depan : profile Form -->
                <div class="card-face card-front">
                    <h2 class="card-title">Kelola Profil Anda</h2>

                    <div class="avatar-container" id="avatarPickerBtn" title="Klik untuk ubah foto profil">
                        @if($user->avatar)
                            <img src="{{ asset($user->avatar) }}" alt="Foto Profil" class="avatar-img" id="currentAvatarImg">
                        @else
                            <img src="{{ asset('images/assets/public/logo/bnn-250x250.avif') }}" alt="Foto Profil" class="avatar-img" id="currentAvatarImg">
                        @endif
                        <div class="avatar-overlay">
                            <i class="fa-regular fa-image"></i>
                        </div>
                    </div>

                    <form id="profileForm" action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="file" id="fileAvatarInput" name="avatar" accept="image/png, image/jpeg, image/jpg, image/webp" style="display: none;">
                        <input type="hidden" id="cameraAvatarData" name="avatar_data" value="">

                        <label class="field-label">Nama Pengguna</label>
                        <div class="input-box">
                            <span class="input-icon">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <input type="text" name="name" id="userNameInput" value="{{ old('name', $user->name) }}" placeholder="Nama Pengguna" required>
                        </div>

                        <label class="field-label">Email</label>
                        <div class="input-box input-disabled">
                            <span class="input-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                            <input type="email" value="{{ $user->email }}" disabled readonly title="Email tidak dapat diubah">
                        </div>

                        <label class="field-label">Password</label>
                        <div class="password-row-group">
                            <div class="input-box input-disabled">
                                <span class="input-icon">
                                    <i class="fa-solid fa-lock"></i>
                                </span>
                                <input type="text" value="************" disabled readonly style="letter-spacing: 2px;">
                            </div>
                            <button type="button" class="btn-outline-ubah" id="btnFlipToReset">Ubah</button>
                        </div>

                        <div id="profileAlert" class="alert-box"></div>

                        <button type="button" class="btn-blue-submit" id="btnPromptSave">Simpan</button>
                    </form>
                </div>

                <!-- card sisi belakang : reset pass -->
                <div class="card-face card-back">
                    <div class="card-header-row">
                        <h2 class="card-title">Reset Password</h2>
                        <button type="button" class="btn-card-back" id="btnFlipBack" title="Kembali ke Kelola Profil">
                            <i class="fa-solid fa-arrow-left"></i>
                        </button>
                    </div>

                    <form id="passwordForm" action="{{ route('user.profile.password') }}" method="POST">
                        @csrf

                        <label class="field-label">Password saat ini</label>
                        <div class="input-box">
                            <span class="input-icon">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input type="password" name="current_password" id="current_password" placeholder="Masukkan password saat ini" required>
                            <button type="button" class="eye-toggle-btn" title="Lihat password">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>

                        <label class="field-label">Password baru</label>
                        <div class="input-box">
                            <span class="input-icon">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input type="password" name="password" id="new_password" placeholder="Minimal 8 karakter" required>
                            <button type="button" class="eye-toggle-btn" title="Lihat password">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>

                        <label class="field-label">Konfirmasi password baru</label>
                        <div class="input-box">
                            <span class="input-icon">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ulangi password baru" required>
                            <button type="button" class="eye-toggle-btn" title="Lihat password">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>

                        <div id="passwordAlert" class="alert-box"></div>

                        <button type="submit" class="btn-blue-reset-submit" id="btnSubmitReset">Reset Password</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- modal konfirmasi simpan -->
    <div class="modal-custom-overlay" id="confirmSaveModal">
        <div class="modal-custom-box" style="width: 360px;">
            <div style="font-size: 44px; color: #f59e0b; margin-bottom: 10px;">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
            <h3 class="modal-title" style="color: #1f2937; margin-bottom: 6px;">Konfirmasi Simpan</h3>
            <p class="modal-desc" style="color: #4b5563; font-size: 13.5px; margin-bottom: 22px;">
                Apakah anda yakin ingin menyimpan perubahan data profil?
            </p>
            <div style="display: flex; gap: 12px; justify-content: center;">
                <button type="button" class="btn-modal-action btn-cancel-confirm" onclick="closeConfirmModal()">Tidak</button>
                <button type="button" class="btn-modal-action btn-ok-confirm" onclick="executeSaveProfile()">Ya</button>
            </div>
        </div>
    </div>

    <!-- modal pilih sumber foto -->
    <div class="modal-custom-overlay" id="photoSourceModal">
        <div class="modal-custom-box">
            <button type="button" class="modal-close-btn" onclick="closePhotoModal()">&times;</button>
            <h3 class="modal-title">Ubah Foto Profil</h3>
            <p class="modal-desc">Pilih sumber foto dari perangkat atau kamera langsung</p>

            <div class="source-options">
                <div class="source-card" onclick="chooseFromDevice()">
                    <i class="fa-solid fa-laptop"></i>
                    <span>This Device</span>
                </div>

                <div class="source-card" onclick="openCameraModal()">
                    <i class="fa-solid fa-camera"></i>
                    <span>Camera</span>
                </div>
            </div>
        </div>
    </div>

    <!-- modal kamera -->
    <div class="modal-custom-overlay" id="cameraModal">
        <div class="modal-custom-box" style="width: 440px;">
            <button type="button" class="modal-close-btn" onclick="closeCameraModal()">&times;</button>
            <h3 class="modal-title">Ambil Foto Profil</h3>
            <p class="modal-desc">Posisikan wajah Anda di tengah bingkai</p>

            <div class="camera-view-box">
                <video id="cameraVideo" class="camera-video" autoplay playsinline></video>
                <canvas id="cameraCanvas" class="camera-canvas" style="display: none;"></canvas>
            </div>

            <div class="camera-actions">
                <button type="button" class="btn-camera btn-capture" id="btnCapturePhoto" onclick="capturePhoto()">
                    <i class="fa-solid fa-camera"></i> Ambil Foto
                </button>
                <button type="button" class="btn-camera btn-retake" id="btnRetakePhoto" onclick="retakePhoto()" style="display: none;">
                    <i class="fa-solid fa-rotate-left"></i> Ulangi
                </button>
                <button type="button" class="btn-camera btn-use-photo" id="btnUsePhoto" onclick="useCapturedPhoto()" style="display: none;">
                    <i class="fa-solid fa-check"></i> Gunakan Foto
                </button>
            </div>
        </div>
    </div>
</body>

</html>