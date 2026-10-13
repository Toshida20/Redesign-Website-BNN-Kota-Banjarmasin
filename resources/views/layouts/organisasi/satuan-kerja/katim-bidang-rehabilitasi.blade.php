@extends('layouts.master')

@section('title', 'Katim Bidang Rehabilitasi - BNN Kota Banjarmasin')

@section('content')

<div class="container mt-5 mb-5" style="padding-top: 40px;">

    @include('layouts.main.navigation-bar.main-media-social')

    <div class="profil-wrapper">

        <nav class="profil-sidebar" aria-label="Navigasi informasi profil">

            <button type="button"
                class="btn-menu active"
                data-target="profil"
                aria-controls="profil"
                aria-selected="true">
                <i class="fa-regular fa-file-lines"></i>
                <span>Profil</span>
            </button>

            <button type="button"
                class="btn-menu"
                data-target="tugas-fungsi"
                aria-controls="tugas-fungsi"
                aria-selected="false">
                <i class="fa-regular fa-lightbulb"></i>
                <span>Tugas dan Fungsi</span>
            </button>

            <button type="button"
                class="btn-menu"
                data-target="struktur"
                aria-controls="struktur"
                aria-selected="false">
                <i class="fa-solid fa-gear"></i>
                <span>Struktur Bidang</span>
            </button>

        </nav>

        <main class="profil-content">

            <section id="profil" class="profil-panel active" aria-hidden="false">

                <div class="information-header-title">
                    <h1>Katim Bidang Rehabilitasi</h1>
                </div>

                <div class="content-sejarah mt-4">
                    
                    <img src="{{ asset('images/team-member-default.jpg') }}" class="information-profile-picture d-block mx-auto" alt="Foto Kasubbag Umum">
                    
                    <h2 class="profil-person-name">Hj. Susanti, S.Kep., MM</h2>
                    <h5 class="profil-person-position">Kasubbag Umum</h5>

                    <p style="text-align: justify; margin-top: 20px;">Kepala Sub Bagian Umum Badan Narkotika Nasional Kota Banjarmasin Subbagian Umum mempunyai tugas melakukan penyiapan bahan pelaksanaan koordinasi penyusunan rencana program dan anggaran, pengelolaan sarana prasarana dan urusan rumah tangga, pengelolaan data informasi P4GN, layanan hukum dan kerja sama, urusan tata persuratan, kepegawaian, keuangan,kearsipan, dokumentasi, hubungan masyarakat, dan penyusunan evaluasi dan pelaporan dalam wilayah BNNK/Kota.</p>
                
                </div>
            </section>

            <section id="tugas-fungsi" class="profil-panel" aria-hidden="true" hidden>

                <div class="information-header-title">
                    <h1>Tugas dan Fungsi Kasubbag Bidang Umum</h1>
                </div>

                <div class="content-sejarah mt-4 text-center">
                    <h3 class="fw-bold mb-4" style="color: #444;">Tugas</h3>
                    <p style="text-align: justify; margin-bottom: 30px;">
                        Subbagian Umum mempunyai tugas melaksanakan dukungan administrasi dan operasional dalam penyelenggaraan tugas dan fungsi BNN Kota Banjarmasin.
                    </p>

                    <h3 class="fw-bold mb-4" style="color: #444;">Fungsi</h3>
                    <p style="text-align: left;">
                        Sejalan dengan hal tersebut di atas, organisasi pelaksana harian BNK Banjarmasin terdiri dari:
                    </p>

                    <ul style="text-align: left; padding-left: 20px;">
                        <li>Penyiapan bahan penyusunan rencana program dan anggaran;</li>
                        <li>Pengelolaan sarana prasarana dan urusan rumah tangga;</li>
                        <li>Pengelolaan administrasi keuangan dan kepegawaian;</li>
                        <li>Pengelolaan tata persuratan, kearsipan, dan dokumentasi;</li>
                        <li>Pengelolaan data dan informasi P4GN;</li>
                        <li>Pelaksanaan layanan hukum dan kerja sama;</li>
                        <li>Pelaksanaan hubungan masyarakat;</li>
                        <li>Penyusunan evaluasi dan pelaporan kegiatan;</li>
                        <li>Penyelenggaraan layanan dukungan operasional dan manajemen.</li>
                        <li>Pengelolaan kearsipan dan dokumentasi.</li>
                    </ul>
                </div>
            </section>

            <section id="struktur" class="profil-panel" aria-hidden="true" hidden>

                <div class="information-header-title">
                    <h1>Struktur Bidang Umum</h1>
                </div>

                <div class="content-sejarah mt-4 text-center">

                    <img src="{{ asset('images/SEKRETARIAT-UTAMA.jpg') }}" class="struktur-bidang-picture d-block mx-auto" alt="Foto Kasubbag Umum">

                </div>
            </section>
        </main>
    </div>
</div>

@endsection