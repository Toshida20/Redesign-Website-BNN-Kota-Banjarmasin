@extends('layouts.master')

@section('title', 'Detail Whistleblowing ' . $report->ticket_number . ' - Panel Admin')

@section('content')
<div class="container-fluid py-4 px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-1">
                    <li class="breadcrumb-item"><a href="{{ route('admin.reports') }}">Lihat Laporan</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.reports.whistleblowing') }}">Whistleblowing & Layanan</a></li>
                    <li class="breadcrumb-item active">{{ $report->ticket_number }}</li>
                </ol>
            </nav>
            <h3 class="fw-bold text-dark mb-0">Detail Pengaduan #{{ $report->ticket_number }}</h3>
        </div>
        <a href="{{ route('admin.reports.whistleblowing') }}" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill mb-3">Whistleblowing & Layanan</span>
                    <h4 class="fw-bold text-dark mb-3">{{ $report->title }}</h4>
                    <div class="row g-3 mb-4 p-3 bg-light rounded-3">
                        <div class="col-sm-6">
                            <span class="text-muted small d-block">Unit Kerja Terkait</span>
                            <strong class="text-dark">{{ $report->incident_location ?? '-' }}</strong>
                        </div>
                        <div class="col-sm-6">
                            <span class="text-muted small d-block">Pihak yang Dilaporkan</span>
                            <strong class="text-dark">{{ $report->suspect_name ?? '-' }}</strong>
                        </div>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Uraian Pengaduan:</h5>
                    <p class="text-secondary lh-lg mb-4" style="white-space: pre-line;">{{ $report->description }}</p>
                    @if($report->evidence_file)
                        <div class="p-3 border rounded-3 mb-3">
                            <a href="{{ asset('storage/' . $report->evidence_file) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                <i class="fa-solid fa-download me-1"></i> Buka / Unduh Lampiran Bukti
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold text-dark mb-3">Identitas Pelapor</h5>
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            @if($report->user && $report->user->avatar)
                                <img src="{{ asset($report->user->avatar) }}" alt="{{ $report->user->name }}" class="rounded-circle object-fit-cover shadow-sm" width="60" height="60">
                            @else
                                <img src="{{ asset('images/assets/public/logo/bnn-250x250.avif') }}" alt="Avatar" class="rounded-circle object-fit-cover shadow-sm" width="60" height="60">
                            @endif
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">{{ $report->user->name ?? 'Pengguna' }}</h6>
                            <span class="text-muted small">{{ $report->user->email ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold text-dark mb-3">Tindak Lanjut</h5>
                    <form action="{{ route('admin.reports.status', $report->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Status</label>
                            <select name="status" class="form-select">
                                <option value="pending" {{ $report->status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                                <option value="diproses" {{ $report->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="selesai" {{ $report->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="ditolak" {{ $report->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Catatan Admin</label>
                            <textarea name="admin_notes" rows="4" class="form-control">{{ $report->admin_notes }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-semibold">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
