@extends('layouts.master')

@section('title', 'Kasubbag Bidang Umum - BNN Kota Banjarmasin')

@section('content')

<div class="container mt-5 mb-5" style="padding-top: 40px;">

    @include('layouts.main.navigation-bar.main-ppid')

    <div class="profil-wrapper">

        <nav class="profil-sidebar" aria-label="Navigasi informasi profil">

            <button type="button"
                class="btn-menu active"
                data-target="profil"
                aria-controls="profil"
                aria-selected="true">
                <i class="fa-regular fa-file-lines"></i>
                <span>Peraturan</span>
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

                <div class="content-sejarah mt-4">
                    <h3 style="text-align: left;">1. INPRES NO. 2 TAHUN 2020</h3>
                    <ul style="text-align: left; padding-left: 20px;">
                        <li><a href="{{ asset('pdf/ppid/peraturan/Tindak-Lanjut-Inpres-No.2-tahun-2020-Bagi-KL.pdf') }}">Link</a></li>
                        <li><a href="{{ asset('pdf/ppid/peraturan/SE-Pedoman-Pelaksanaan-Inpres-No-2-thn-2020-di-Lingkungan-BNN.pdf') }}">Link</a></li>
                    </ul>
                </div>
            </section>

            <section id="tugas-fungsi" class="profil-panel" aria-hidden="true" hidden>

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

                <div class="content-sejarah mt-4 text-center">

                    <img src="{{ asset('images/SEKRETARIAT-UTAMA.jpg') }}" class="struktur-bidang-picture d-block mx-auto" alt="Foto Kasubbag Umum">

                </div>
            </section>
        </main>
    </div>
</div>

@endsection