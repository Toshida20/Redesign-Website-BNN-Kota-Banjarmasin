@extends('layouts.main')

@section('title', 'Alamat Kantor - BNN Kota Banjarmasin')

@section('content')
<div class="container mt-5 mb-5" style="padding-top: 68px;">

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
                <div class="hero-line-short"></div>
                    <div class="contact-information">
                        <img src="{{ asset('images/assets/public/icon/icon-phone.png') }}"></img>
                        <p>184</p>
                        <img src="{{ asset('images/assets/public/icon/icon-phone.png') }}"></img>
                        <p>0511 3201367</p>
                        <img src="{{ asset('images/assets/public/icon/icon-mail.png') }}"></img>
                        <p>callcenter[at]bnn.go.id</p>
                    </div>
                </div>
            </div>
            <div class="right-container">
                <div class="kontak-kami-card">
                    <div class="kontak-kami">
                        <form>
                            <h1>Kontak Kami</h1>
                        <div class="caution-information">
                            <p>Formulir ini adalah fasilitas untuk melakukan korespondensi umum kepada kami, dan BUKAN fasilitas untuk melakukan pelaporan penyalahgunaan narkoba. Untuk melaporkan penyalahgunaan narkoba mohon menggunakan fasilitas LAPOR yang terdapat pada navigasi utama situs ini.</p>
                            <p>Mohon mengisi data-data yang akurat sesuai yang diperlukan. Data yang Anda kirimkan akan kami rahasiakan sepenuhnya.</p>
                        </div>
                        <div class="form-container">
                            <div class="blurred-content">
                                <h1>Masuk untuk Mengirim Pesan</h1>
                                <h2>Untuk menjaga keamanan dan memudahkan pengelolaan pengaduan, Anda perlu masuk ke akun terlebih dahulu.</h2>
                                <button class="button-masuk" id="button-masuk">Masuk</button>
                            </div>
                            <h2>Subyek</h2>
                            <label>
                                <textarea rows="4"></textarea>
                            </label>
                            <h2>Pesan</h2>
                            <label>
                                <textarea rows="4"></textarea>
                            </label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
