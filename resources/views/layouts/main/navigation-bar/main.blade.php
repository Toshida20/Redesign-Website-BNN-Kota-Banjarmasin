<div class="navigation-tab">
<nav class="navbar navbar-dark" style="background-color: #174b83;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img 
                id="bnn-logo"
                src="{{ asset('images/assets/public/logo/bnn-250x250.avif') }}" 
                alt="Logo BNN"
                width="30"
                height="30"
                class="me-2 logo-transition"
            >
            <span class="fw-bold" style="font-size: 12px; line-height: 1.2;">
                Badan Narkotika Nasional<br>
                Kota Banjarmasin
            </span>
        </a>
        
        <div class="d-flex align-items-center gap-3">
            <a href="https://bnn.go.id/" class="nav-link text-white menu-nav"><span>BNN Pusat</span></a>
            <a href="https://jdih.bnn.go.id/" class="nav-link text-white menu-nav"><span>Peraturan (JDIH)</span></a>
            <a href="#" class="nav-link text-white menu-nav"><span>Government Public Relations (GPR)</span></a>
        </div>
    </div>
</nav>

<nav class="navbar navbar-light navbar-second">
    <div class="container-fluid">
        <div class="navbar-right">
            <div class="menu-nav-2-container">
            <a href="{{ url('/') }}" class="menu-nav-2 {{ request()->is('/') ? 'active' : '' }}">
                <span>BERANDA</span>
            </a>

            <div class="nav-item-dropdown">
                <a href="{{ url('/informasi-profil') }}" class="menu-nav-2 {{ request()->is('organisasi', 'informasi-profil', 'visi-dan-misi', 'tugas-dan-fungsi', 'struktur', 'alamat-kantor-bnnp-bnnk', 'lhkpn', 'kepala-bnn-k-dari-masa-ke-masa') ? 'active' : '' }}">
                    <span>ORGANISASI</span>
                </a>
                <div class="dropdown-content">
                    <a href="{{ url('/informasi-profil') }}">Informasi Profil</a>
                    <a href="{{ url('/kepala-bnn-k-dari-masa-ke-masa') }}">Kepala BNNK dari Masa Ke Masa</a>
                        <div class="nav-item-dropdown-2">
                            <a href="#" style="display: flex; justify-content: space-between; align-items: center;">
                                <span>Satuan Kerja</span>
                                <img id="icon-dropdown" src="{{ asset('images/assets/public/button/right-arrow-white.png') }}" width="10" height="10">
                            </a>
                        <div class="dropdown-content-2">
                            <a href="{{ url('/satuan-kerja/kasubbag-umum') }}">Kepala Sub Bagian Umum</a>
                            <a href="{{ url('/satuan-kerja/katim-bidang-pencegahan-dan-pemberdayaan-masyarakat') }}">Katim Bidang Pencegahan dan Pemberdayaan Masyarakat</a>
                            <a href="{{ url('/satuan-kerja/katim-bidang-rehabilitasi') }}">Katim Bidang Rehabilitasi</a>
                            <a href="{{ url('/satuan-kerja/katim-bidang-pemberantasan') }}">Katim Bidang Pemberantasan</a>
                            <a href="{{ url('/satuan-kerja/alamat-kantor-bnnp-bnnk') }}">BNN Provinsi, Kabupaten/Kota dan Balai Rehabilitasi</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nav-item-dropdown">
                <a href="#" class="menu-nav-2 {{ request()->is('berita') ? 'active' : '' }}">
                    <span>BERITA</span>
                </a>
                <div class="dropdown-content">
                    <div class="nav-item-dropdown-2">
                        <a href="#">
                            <span>Berita Satker</span>
                            <img id="icon-dropdown" src="{{ asset('images/assets/public/button/right-arrow-white.png') }}" width="10" height="10">
                        </a>
                        <div class="dropdown-content-2">
                            <a href="#">Kassubag Umum</a>
                            <a href="#">Katim Bidang Pencegahan dan Pemberdayaan Masyarakat</a>
                            <a href="#">Katim Bidang Rehabilitasi</a>
                            <a href="#">Katim Bidang Pemberantasan</a>
                            <a href="{{ url('/berita-utama') }}">Berita Utama</a>
                            <a href="{{ url('/berita-kegiatan') }}">Berita Kegiatan</a>
                        </div>
                    </div>
                    <a href="{{ url('/foto') }}">Foto</a>
                    <a href="{{ url('/video') }}">Video</a>
                </div>
            </div>

            <div class="nav-item-dropdown">
                <a href="#" class="menu-nav-2 {{ request()->is('publikasi') ? 'active' : '' }}">
                    <span>PUBLIKASI</span>
                </a>
                <div class="dropdown-content">
                    <a href="{{ url('/artikel') }}">Artikel</a>
                    <a href="{{ url('/siaran-pers') }}">Siaran Pers</a>
                </div>
            </div>

            <a href="{{ url('kontak') }}" class="menu-nav-2 {{ request()->is('kontak') ? 'active' : '' }}">
                <span>KONTAK</span>
            </a>

            <div class="nav-item-dropdown">
                <a href="#" class="menu-nav-2 {{ request()->is('layanan') ? 'active' : '' }}">
                    <span>LAYANAN</span>
                </a>
                <div class="dropdown-content">
                    <a href="https://boss.bnn.go.id/">BNN One Stop Service (BOSS)</a>
                    <a href="https://www.lapor.go.id/">Toko Stop Narkoba</a>
                    <a href="https://perpustakaan.bnn.go.id/id">Perpustakaan Digital</a>
                </div>
            </div>

            <a href="#" class="menu-nav-2 {{ request()->is('ppid') ? 'active' : '' }}">
                <span>PPID</span>
            </a>

            <div class="nav-item-dropdown">
                <a href="#" class="menu-nav-2 lapor {{ request()->is('lapor') ? 'active' : '' }}">
                    <span>LAPOR</span>
                </a>
                <div class="dropdown-content">
                    <a href="#">Aspirasi Masyarakat</a>
                    <div class="nav-item-dropdown-2">
                        <a href="#">
                            <span>Pengaduan BNN</span>
                            <img id="icon-dropdown" src="{{ asset('images/assets/public/button/right-arrow-white.png') }}" width="10" height="10">
                        </a>
                        <div class="dropdown-content-2">
                            <a href="#">Penyalahgunaan Narkoba</a>
                            <a href="#">Whistleblowing Dan Pengaduan Pelayanan Publik</a>
                            <a href="#">Pelaporan Gratifikasi</a>
                        </div>
                    </div>
                    <a href="https://www.lapor.go.id/">LAPOR!</a>
                </div>
            </div>

            </div>
        </div>
        
        <div class="login-user">
            @guest
                <a href="{{ url('/login') }}" class="login-button"> <img class="login-icon" src="{{ asset('images/assets/public/icon/icon-login-avatar.png') }}"></img>Masuk</a>
            @endguest

            @auth
                {{-- Wadah profil yang ditampilkan saat user sudah login --}}
                <div class="profile-dropdown-container">
                    <div class="login-user-header" id="profileDropdownBtn">
                        <div class="login-arrow">
                            <i class="fa-solid fa-chevron-down" id="profileDropdownIcon"></i>
                        </div>
                        <div class="login-text">
                            <small>Login Sebagai</small>
                            <strong>{{ Auth::user()->name ?? 'Tamu' }}</strong>
                        </div>
                        <div class="user-icon">
                            @if(Auth::user()->avatar)
                                <img src="{{ asset(Auth::user()->avatar) }}" class="rounded-circle" width="45" height="45" alt="Avatar">
                            @else
                                <img src="{{ asset('images/assets/public/logo/bnn-250x250.avif') }}" class="rounded-circle" width="45" height="45" alt="Avatar">
                            @endif
                        </div>
                    </div>

                    {{-- Dropdown Menu --}}
                    <div class="profile-dropdown-menu" id="profileDropdownMenu">
                        <a href="#" class="dropdown-item">
                            <i class="fa-regular fa-circle-user"></i> Kelola Profil
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="fa-regular fa-clock"></i> Riwayat Aktivitas
                        </a>
                        <a href="#" class="dropdown-item logout-item" onclick="confirmLogout(event)">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar
                        </a>
                    </div>
                </div>

                {{-- Hidden Form for Logout --}}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                {{-- Modal Konfirmasi Logout --}}
                <div id="logoutModal" class="custom-modal-overlay">
                    <div class="custom-modal-box">
                        <div class="modal-icon-warning">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                        </div>
                        <h3>Konfirmasi Keluar</h3>
                        <p>Apakah anda yakin ingin keluar dari akun ini?</p>
                        <div class="custom-modal-actions">
                            <button onclick="closeLogoutModal()" class="btn-cancel">Tidak</button>
                            <button onclick="document.getElementById('logout-form').submit();" class="btn-confirm">Ya</button>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
        </div>    
    </nav>
</div>

