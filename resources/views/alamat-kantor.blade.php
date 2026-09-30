@extends('layouts.main')

@section('title', 'Alamat Kantor - BNN Kota Banjarmasin')

@section('content')
<div class="container mt-5 mb-5" style="padding-top: 40px;">

    @include('layouts.main-informasi-profil')

    <div class="content-sejarah mt-4 text-center">
        <h2 class="fw-bold mb-4" style="color: #444;">Map Kantor BNN Kota Banjarmasin</h2>
    </div>

    {{-- Map Container — lebar mengikuti .hero-line-long (width: 100% dalam .container) --}}
    <div class="map-kantor-wrapper">
        <div id="map-kantor"></div>
    </div>

</div>

@endsection
