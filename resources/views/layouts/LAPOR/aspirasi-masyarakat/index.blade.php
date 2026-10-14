@extends('layouts.master')

@section('title', 'Formulir Aspirasi Masyarakat - BNN Kota Banjarmasin')

@section('content')
<div class="container mt-4 mb-5" style="padding-top: 15px;">

    @include('layouts.main.navigation-bar.main-media-social')

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="aspirasi-page-container">
        <!-- Subheading & Deskripsi Aspirasi -->
        <div class="aspirasi-header-intro">
            <h2 class="aspirasi-title">Formulir Aspirasi Masyarakat</h2>
            <p class="aspirasi-desc">
                ASPIRASI adalah penyampaian saran maupun masukan terkait pelayanan publik yang dapat meningkatkan kualitas pengelolaan pelayanan publik di BNN. Pastikan hal-hal berikut ini sebelum Anda memberikan aspirasi: 1. Aspirasi Anda relevan dengan kinerja BNN. 2. Menggunakan Bahasa Indonesia yang baik dan benar. 3. Bukan merupakan ujaran kebencian, SARA, dan caci maki. 4. Bukan merupakan laporan yang sudah disampaikan dan masih dalam proses penanganan.
            </p>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><i class="fa-solid fa-triangle-exclamation me-1"></i> Terjadi kesalahan pengisian formulir:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Wrapper Form & Sticky Blurred Overlay --}}
        <div class="aspirasi-wrapper">
            {{-- Overlay Blur + Hero Statis untuk Tamu / User yang Belum Login --}}
            @guest
                <div class="aspirasi-blurred-overlay">
                    <div class="aspirasi-hero-box">
                        <h3 class="hero-blur-title">Masuk Untuk Mengirim Aspirasi</h3>
                        <p class="hero-blur-desc">
                            Untuk Menjaga Keamanan Dan Memudahkan Pengelolaan Tanggapan, Anda Perlu Masuk Ke Akun Terlebih Dahulu.
                        </p>
                        <a href="{{ route('login') }}" class="button-masuk">Masuk</a>
                    </div>
                </div>
            @endguest

            <form action="{{ route('lapor.aspirasi.store') }}" method="POST" class="aspirasi-form @guest form-blurred @endguest">
                @csrf

                <!-- Judul Aspirasi -->
                <div class="aspirasi-form-group">
                    <label class="aspirasi-field-label">Judul Aspirasi</label>
                    <textarea name="title" rows="2" class="aspirasi-input aspirasi-input-title" placeholder="Tuliskan judul aspirasi Anda..." required>{{ old('title') }}</textarea>
                </div>

                <!-- Isi Aspirasi -->
                <div class="aspirasi-form-group">
                    <label class="aspirasi-field-label">Isi Aspirasi</label>
                    <textarea name="description" rows="5" class="aspirasi-input aspirasi-input-desc" placeholder="Uraikan isi aspirasi Anda secara rinci..." required>{{ old('description') }}</textarea>
                </div>

                @auth
                    <div class="form-submit-wrapper text-center mt-4">
                        <button type="submit" class="button-kirim">Kirim</button>
                    </div>
                @endauth
            </form>
        </div>
    </div>
</div>

@endsection