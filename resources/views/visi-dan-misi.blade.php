@extends('layouts.main')

@section('title', 'Visi dan Misi BNN Kota Banjarmasin')

@section('content')
<div class="container mt-5 mb-5" style="padding-top: 40px;">
    
    @include('layouts.main-informasi-profil')
    
    <div class="content-sejarah mt-4 text-center">
        <h3 class="fw-bold mb-4" style="color: #444;">Visi</h3>
        <p style="text-align: justify; margin-bottom: 30px;">
            Menjadi perwakilan BNN RI di Kota Banjarmasin yang Profesional dan Mampu Menyatukan dan Menggerakkan Seluruh Komponen Masyarakat di Wilayah Kota Banjarmasin dalam Melaksanakan Pencegahan, Pemberantasan, Penyalahgunaan dan Peredaran Gelap Narkoba (P4GN).
        </p>

        <h3 class="fw-bold mb-4" style="color: #444;">Misi</h3>
        <p style="text-align: left;">
            Sejalan dengan hal tersebut di atas, organisasi pelaksana harian BNK Banjarmasin terdiri dari:
        </p>

        <ol style="text-align: left; padding-left: 20px;">
            <li>Pencegahan</li>
            <li>Pemberdayaan Masyarakat</li>
            <li>Rehabilitasi (Penjangkauan dan Pendampingan)</li>
            <li>Pemberantasan</li>
            <li>Tata Kelola Pemerintahan yang Akuntabel</li>
        </ol>
    </div>
</div>
@endsection
