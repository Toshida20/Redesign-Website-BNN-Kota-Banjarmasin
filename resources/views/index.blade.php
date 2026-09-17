@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h2 class="fw-bold">Dashboard</h2>
        <p class="text-muted">
            Ini text test doang
        </p>
    </div>

    <div class="row g-4">

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Total Kegiatan</h6>
                    <h2 class="fw-bold">0</h2>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Total Peserta</h6>
                    <h2 class="fw-bold">0</h2>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Surat Masuk</h6>
                    <h2 class="fw-bold">3</h2>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Arsip</h6>
                    <h2 class="fw-bold">0</h2>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection