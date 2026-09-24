@extends('layouts.main')

@section('title', 'Tugas dan Fungsi BNN Kota Banjarmasin')

@section('content')
<div class="container mt-5 mb-5" style="padding-top: 40px;">
    
    @include('layouts.main-informasi-profil')
    
    <div class="content-sejarah mt-4 text-center">
        <h2 class="fw-bold mb-4" style="color: #444;">Struktur Organisasi</h2>
        <h3 class="fw-bold mb-4" style="color: #444;">Badan Narkotika Nasional Kota Banjarmasin Tahun 2025-2026</h3>
    </div>

    <div id="struktur-bg" class="struktur-bg"></div>
    <div class="struktur-overlay"></div>

</div>
@endsection
