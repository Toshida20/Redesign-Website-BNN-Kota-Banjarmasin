@extends('layouts.master')

@section('title', 'Katim Bidang Rehabilitasi - BNN Kota Banjarmasin')

@section('content')
<div class="container mt-5 mb-5" style="padding-top: 40px;">

    @include('layouts.main.navigation-bar.main-media-social')

    <div class="nav-full-width">
        <a href="{{ url('informasi-profil') }}" class="btn-menu {{ request()->is('informasi-profil') ? 'active' : '' }}">Profil</a>
        <a href="{{ url('visi-dan-misi') }}" class="btn-menu {{ request()->is('visi-dan-misi') ? 'active' : '' }}">Tugas dan Fungsi</a>
        <a href="{{ url('tugas-dan-fungsi') }}" class="btn-menu {{ request()->is('tugas-dan-fungsi') ? 'active' : '' }}">Struktur Bidang</a>
    </div>

    <div class="content-header text-center">
        <h2 class="fw-bold" style="color: #444;">Katim Bidang Rehabilitasi</h2>
    </div>

    <div class=""></div>

</div>

@endsection