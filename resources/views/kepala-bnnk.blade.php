@extends('layouts.main')

@section('title', 'Kepala-kepala - BNN Kota Banjarmasin')

@section('content')
<div class="container mt-5 mb-5" style="padding-top: 87px;">

    @include('layouts.main-media-social')
    <div class="content-sejarah mt-4 text-center">
        <h2 class="fw-bold mb-4" style="color: #444;">Kepala BNNK dari Masa Ke Masa</h2>
    </div>
</div>

<div class="timeline-container" id="timeline-container">
    <div class="timeline-line-bg"></div>
    <div class="timeline-line-fill" id="timeline-line-fill"></div>

    @php
        $kepalaList = [
            'Komisaris Besar Polisi Wuryantono, S.I.K.,MH',
            'Komisaris Besar Polisi Wuryantono, S.I.K.,MH',
            'Komisaris Besar Polisi Wuryantono, S.I.K.,MH',
            'Komisaris Besar Polisi Wuryantono, S.I.K.,MH',
            'Komisaris Besar Polisi Wuryantono, S.I.K.,MH',
            'Komisaris Besar Polisi Wuryantono, S.I.K.,MH',
            'Komisaris Besar Polisi Wuryantono, S.I.K.,MH'
        ];
    @endphp

    @foreach($kepalaList as $index => $nama)
    <div class="timeline-item {{ $index % 2 == 0 ? 'left' : 'right' }}">
        <div class="timeline-checkpoint">
            <div class="checkpoint-border-fill"></div>
        </div>
        <div class="timeline-half">
            <button class="timeline-card card-profile">
                <div class="timeline-arrow"></div>
                <div class="timeline-card-inner">
                    <img src="{{ asset('images/Wuryantono.jpeg') }}" alt="Kepala">
                    <div class="overlay-gradient"></div>
                    <h3>{{ $nama }}</h3>
                </div>
            </button>
        </div>
    </div>
    @endforeach
</div>

@endsection