@extends('layouts.main')

@section('title', 'Video')

@section('content')
<div class="container mt-5 mb-5" style="padding-top: 20px;">
    <a href="{{ url('/') }}" class="btn btn-primary mb-3">Kembali ke Beranda</a>
    
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h1 class="fw-bold mb-4">Video</h1>
            <p>
                Ini adalah halaman informasi profil dengan tampilan yang memiliki navbar dan footer, 
                tanpa konten khusus landing page (video, card kegiatan, dll).
            </p>
        </div>
    </div>
</div>
@endsection
