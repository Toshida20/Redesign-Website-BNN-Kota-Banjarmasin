@extends('layouts.master')

@section('title', 'Lihat Laporan - Panel Admin')

@section('content')
<div class="container-fluid py-4 px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">Lihat Laporan</h2>
            <p class="text-muted mb-0">Kelola dan pantau seluruh laporan serta aspirasi yang diajukan oleh masyarakat.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Dashboard
        </a>
    </div>

    <!-- Ringkasan Statistik Laporan -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3">
                <div class="d-flex align-items-center">
                    <div class="rounded-3 bg-primary bg-opacity-10 p-3 text-primary me-3">
                        <i class="fa-solid fa-folder-open fs-3"></i>
                    </div>
                    <div>
                        <span class="text-muted small">Total Laporan</span>
                        <h4 class="fw-bold mb-0">{{ $counts['total'] ?? 0 }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3">
                <div class="d-flex align-items-center">
                    <div class="rounded-3 bg-warning bg-opacity-10 p-3 text-warning me-3">
                        <i class="fa-solid fa-clock-rotate-left fs-3"></i>
                    </div>
                    <div>
                        <span class="text-muted small">Menunggu Respon</span>
                        <h4 class="fw-bold mb-0">{{ $counts['pending'] ?? 0 }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kategori Menu Laporan -->
    <h5 class="fw-bold text-dark mb-3">Pilih Kategori Laporan</h5>
    <div class="row g-4">
        <!-- 1. Penyalahgunaan Narkoba -->
        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 hover-card">
                <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                        <div class="badge bg-danger bg-opacity-10 text-danger p-2 px-3 rounded-pill mb-3">
                            <i class="fa-solid fa-shield-halved me-1"></i> Pengaduan
                        </div>
                        <h5 class="fw-bold mb-2">Penyalahgunaan Narkoba</h5>
                        <p class="text-muted small mb-3">Daftar laporan aduan dugaan penyalahgunaan dan peredaran narkoba dari masyarakat.</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                        <span class="badge bg-light text-dark">{{ $counts['narkoba'] ?? 0 }} Laporan</span>
                        <a href="{{ route('admin.reports.narkoba') }}" class="btn btn-sm btn-primary rounded-pill px-3">
                            Buka Daftar <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. Aspirasi Masyarakat -->
        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 hover-card">
                <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                        <div class="badge bg-info bg-opacity-10 text-info p-2 px-3 rounded-pill mb-3">
                            <i class="fa-solid fa-comments me-1"></i> Aspirasi
                        </div>
                        <h5 class="fw-bold mb-2">Aspirasi Masyarakat</h5>
                        <p class="text-muted small mb-3">Daftar ide, saran, masukan, dan partisipasi publik untuk BNN Kota Banjarmasin.</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                        <span class="badge bg-light text-dark">{{ $counts['aspirasi'] ?? 0 }} Laporan</span>
                        <a href="{{ route('admin.reports.aspirasi') }}" class="btn btn-sm btn-primary rounded-pill px-3">
                            Buka Daftar <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Whistleblowing & Pelayanan Publik -->
        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 hover-card">
                <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                        <div class="badge bg-warning bg-opacity-10 text-warning p-2 px-3 rounded-pill mb-3">
                            <i class="fa-solid fa-bullhorn me-1"></i> WBS
                        </div>
                        <h5 class="fw-bold mb-2">Whistleblowing & Layanan</h5>
                        <p class="text-muted small mb-3">Daftar laporan pengaduan pelanggaran prosedur dan kepuasan pelayanan publik.</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                        <span class="badge bg-light text-dark">{{ $counts['whistleblowing'] ?? 0 }} Laporan</span>
                        <a href="{{ route('admin.reports.whistleblowing') }}" class="btn btn-sm btn-primary rounded-pill px-3">
                            Buka Daftar <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Pelaporan Gratifikasi -->
        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 hover-card">
                <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                        <div class="badge bg-success bg-opacity-10 text-success p-2 px-3 rounded-pill mb-3">
                            <i class="fa-solid fa-hand-holding-dollar me-1"></i> Gratifikasi
                        </div>
                        <h5 class="fw-bold mb-2">Pelaporan Gratifikasi</h5>
                        <p class="text-muted small mb-3">Daftar laporan penerimaan, pemberian, atau penolakan gratifikasi pegawai.</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                        <span class="badge bg-light text-dark">{{ $counts['gratifikasi'] ?? 0 }} Laporan</span>
                        <a href="{{ route('admin.reports.gratifikasi') }}" class="btn btn-sm btn-primary rounded-pill px-3">
                            Buka Daftar <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
