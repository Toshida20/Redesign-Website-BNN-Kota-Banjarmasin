@extends('layouts.master')

@section('title', 'Kasubbag Bidang Umum - BNN Kota Banjarmasin')

@section('content')
<div class="container mt-5 mb-5" style="padding-top: 40px;">

    @include('layouts.main.navigation-bar.main-media-social')

    <div class="nav-full-width">
        <a href="{{ url('informasi-profil') }}" class="btn-menu {{ request()->is('informasi-profil') ? 'active' : '' }}">Profil</a>
        <a href="{{ url('visi-dan-misi') }}" class="btn-menu {{ request()->is('visi-dan-misi') ? 'active' : '' }}">Tugas dan Fungsi</a>
        <a href="{{ url('tugas-dan-fungsi') }}" class="btn-menu {{ request()->is('tugas-dan-fungsi') ? 'active' : '' }}">Struktur Bidang</a>
    </div>

    <div class="content-header text-center mb-4">
        <h2 class="fw-bold" style="color: #666;">Kasubbag Bidang Umum</h2>
    </div>

    <div class="main-content-container text-center">
        <img src="{{ asset('images/team-member-default.jpg') }}" alt="Hj. Susanti" class="img-fluid mb-3" style="border: 4px solid #0d6efd; max-width: 250px;">
        <h4 class="mb-1" style="color: #000;">Hj. Susanti, S.Kep., MM</h4>
        <h5 class="fw-bold mb-4" style="color: #000;">Kasubbag Umum</h5>
        <p class="mx-auto" style="max-width: 700px; text-align: center; color: #111; line-height: 1.6;">
            Kepala Sub Bagian Umum Badan Narkotika Nasional Kota Banjarmasin Subbagian Umum mempunyai tugas melakukan penyiapan bahan pelaksanaan koordinasi penyusunan rencana program dan anggaran, pengelolaan sarana prasarana dan urusan rumah tangga, pengelolaan data informasi P4GN, layanan hukum dan kerja sama, urusan tata persuratan, kepegawaian, keuangan,kearsipan, dokumentasi, hubungan masyarakat, dan penyusunan evaluasi dan pelaporan dalam wilayah BNNK/Kota.
        </p>
    </div>
</div>

@endsection
