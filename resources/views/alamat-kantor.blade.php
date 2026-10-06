@extends('layouts.main')

@section('title', 'Alamat Kantor - BNN Kota Banjarmasin')

@section('content')
<div class="container mt-5 mb-5" style="padding-top: 40px;">

    @include('layouts.main-informasi-profil')

    <div class="content-sejarah mt-4 text-center">
        <h2 class="fw-bold mb-4" style="color: #444;">Map Kantor BNN Kota Banjarmasin</h2>
    </div>

    <div class="map-kantor-wrapper">
        <div id="map-kantor"></div>
    </div>

    <div class="alamat-container-wrapper">
        <div class="left-container">
            <div class="alamat-information">
                <h2>Badan Narkotika Nasional Republik Indonesia Kota Banjarmasin</h2>
                <div class="hero-line-alamat-information"></div>
                    <p class="alamat-text">Jl. Pangeran Hidayatullah, Benua Anyar, Kec. Banjarmasin Tim., Kota Banjarmasin, Kalimantan Selatan 70121</p>
                    <div class="contact-information">
                        <div class="contact-item">
                            <i class="fa-solid fa-phone"></i>
                            <p>184</p>
                        </div>
                        <div class="contact-item">
                            <i class="fa-solid fa-phone"></i>
                            <p>0511 3201367</p>
                        </div>
                        <div class="contact-item">
                            <i class="fa-solid fa-envelope"></i>
                            <p>callcenter[at]bnn.go.id</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-container">
                <div class="kontak-kami-card">
                    <div class="kontak-kami">
                        <h1>Kontak Kami</h1>
                        <div class="caution-information">
                            <p>Formulir ini adalah fasilitas untuk melakukan korespondensi umum kepada kami, dan <strong>BUKAN</strong> fasilitas untuk melakukan pelaporan penyalahgunaan narkoba. Untuk melaporkan penyalahgunaan narkoba mohon menggunakan fasilitas <a href="#" class="lapor-link">LAPOR</a> yang terdapat pada navigasi utama situs ini.</p>
                            <p>Mohon mengisi data-data yang akurat sesuai yang diperlukan. <strong>Data yang Anda kirimkan akan kami rahasiakan sepenuhnya.</strong></p>
                        </div>
                        <div class="form-container">
                            {{-- Overlay blur untuk user yang belum login --}}
                            @guest
                                <div class="blurred-overlay" id="blurred-overlay">
                                    <div class="blurred-overlay-content">
                                        <h3>Masuk Untuk Mengirim Pesan</h3>
                                        <p>Untuk Menjaga Keamanan Dan Memudahkan Pengelolaan Pengaduan, Anda Perlu Masuk Ke Akun Terlebih Dahulu.</p>
                                        <a href="{{ url('/login') }}" class="button-masuk">Masuk</a>
                                    </div>
                                </div>
                            @endguest

                            <form action="#" method="POST" class="kontak-form @guest form-blurred @endguest">
                                @csrf
                                <h2>Subyek</h2>
                                <label>
                                    <textarea rows="4" name="subyek" @guest disabled @endguest></textarea>
                                </label>
                                <h2>Pesan</h2>
                                <label>
                                    <textarea rows="4" name="pesan" @guest disabled @endguest></textarea>
                                </label>
                                @auth
                                    <div class="form-submit-wrapper">
                                        <button type="submit" class="button-kirim">Kirim</button>
                                    </div>
                                @endauth
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
