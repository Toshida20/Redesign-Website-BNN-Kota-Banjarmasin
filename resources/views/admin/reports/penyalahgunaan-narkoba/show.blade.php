@extends('layouts.master')

@section('title', 'Detail Laporan ' . $report->ticket_number . ' - Panel Admin')

@section('content')
<div class="container-fluid py-4 px-4">
    <!-- Header Page -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-1">
                    <li class="breadcrumb-item"><a href="{{ route('admin.reports') }}">Lihat Laporan</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.reports.narkoba') }}">Penyalahgunaan Narkoba</a></li>
                    <li class="breadcrumb-item active">{{ $report->ticket_number }}</li>
                </ol>
            </nav>
            <h3 class="fw-bold text-dark mb-0">Detail Laporan P4GN #{{ $report->ticket_number }}</h3>
        </div>
        <a href="{{ route('admin.reports.narkoba') }}" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        <!-- Kolom Kiri: Rincian Lengkap Laporan P4GN -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill">
                            <i class="fa-solid fa-shield-halved me-1"></i> Laporan P4GN
                        </span>
                        <span class="text-muted small">
                            Tgl Masuk: {{ $report->created_at->format('d M Y, H:i') }} WITA
                        </span>
                    </div>

                    <!-- 1. IDENTITAS TERLAPOR & KASUS -->
                    <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">1. Identitas Terlapor</h5>
                    <div class="row g-3 mb-4 p-3 bg-light rounded-3">
                        <div class="col-sm-6">
                            <span class="text-muted small d-block">Nama Terlapor</span>
                            <strong class="text-dark fs-6">{{ $report->terlapor_name ?? ($report->suspect_name ?? '-') }}</strong>
                        </div>
                        <div class="col-sm-6">
                            <span class="text-muted small d-block">Nomor Telepon Terlapor</span>
                            <strong class="text-dark">{{ $report->terlapor_phone ?? '-' }}</strong>
                        </div>
                        <div class="col-sm-6">
                            <span class="text-muted small d-block">Peran Terlapor</span>
                            <span class="badge bg-primary text-white">{{ $report->peran_terlapor ?? 'Belum Ditentukan' }}</span>
                        </div>
                        <div class="col-sm-6">
                            <span class="text-muted small d-block">Profesi / Pekerjaan</span>
                            <strong class="text-dark">{{ $report->pekerjaan_terlapor ?? '-' }}</strong>
                        </div>
                        <div class="col-12">
                            <span class="text-muted small d-block">Alamat Terlapor</span>
                            @if(is_array($report->terlapor_address))
                                <div class="text-dark">
                                    {{ implode(', ', array_filter($report->terlapor_address)) ?: '-' }}
                                </div>
                            @else
                                <div class="text-dark">{{ $report->terlapor_address ?? '-' }}</div>
                            @endif
                        </div>
                    </div>

                    <!-- 2. DETAIL TINDAK PIDANA NARKOBA -->
                    <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">2. Detail Informasi Narkoba</h5>
                    <div class="row g-3 mb-4 p-3 bg-light rounded-3">
                        <div class="col-sm-6">
                            <span class="text-muted small d-block mb-1">Jenis Narkoba</span>
                            @if(is_array($report->jenis_narkoba) && count($report->jenis_narkoba) > 0)
                                @foreach($report->jenis_narkoba as $jn)
                                    <span class="badge bg-danger bg-opacity-25 text-danger border border-danger-subtle me-1 mb-1">{{ $jn }}</span>
                                @endforeach
                            @else
                                <span class="text-dark">-</span>
                            @endif
                        </div>
                        <div class="col-sm-6">
                            <span class="text-muted small d-block">Banyaknya / Jumlah Narkoba</span>
                            <strong class="text-dark">{{ $report->jumlah_narkoba ?? '-' }}</strong>
                        </div>
                        <div class="col-12">
                            <span class="text-muted small d-block">Alamat / Lokasi Kejadian (TKP)</span>
                            @if(is_array($report->alamat_kejadian))
                                <div class="text-dark">
                                    {{ implode(', ', array_filter($report->alamat_kejadian)) ?: ($report->incident_location ?? '-') }}
                                </div>
                            @else
                                <div class="text-dark">{{ $report->alamat_kejadian ?? ($report->incident_location ?? '-') }}</div>
                            @endif
                        </div>
                        <div class="col-12">
                            <span class="text-muted small d-block">Kendaraan Terlapor & Plat Nomor</span>
                            <strong class="text-dark">{{ $report->kendaraan_terlapor ?? '-' }}</strong>
                        </div>
                    </div>

                    <!-- 3. URAIAN KRONOLOGI & INFORMASI -->
                    <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">3. Uraian & Informasi Pendukung</h5>
                    <div class="mb-3">
                        <span class="text-muted small d-block fw-semibold mb-1">Uraian Cara Pengedaran / Transaksi:</span>
                        <p class="text-secondary p-3 bg-light rounded-3 lh-lg mb-0" style="white-space: pre-line;">{{ $report->uraian_transaksi ?? ($report->description ?? '-') }}</p>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-sm-6">
                            <span class="text-muted small d-block fw-semibold mb-1">Lokasi Sering Terlihat / Nongkrong:</span>
                            <p class="text-secondary p-3 bg-light rounded-3 mb-0">{{ $report->lokasi_nongkrong ?? '-' }}</p>
                        </div>
                        <div class="col-sm-6">
                            <span class="text-muted small d-block fw-semibold mb-1">Asal Sumber Informasi:</span>
                            <p class="text-secondary p-3 bg-light rounded-3 mb-0">{{ $report->sumber_informasi ?? '-' }}</p>
                        </div>
                    </div>

                    <!-- 4. LAMPIRAN FOTO LOKASI -->
                    <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">4. Foto Lokasi</h5>
                    @if(is_array($report->lokasi_photos) && count($report->lokasi_photos) > 0)
                        <div class="row g-2 mb-4">
                            @foreach($report->lokasi_photos as $locImg)
                                <div class="col-6 col-md-4">
                                    <a href="{{ asset('storage/' . $locImg) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $locImg) }}" alt="Foto Lokasi" class="img-fluid rounded border shadow-sm" style="height: 140px; width: 100%; object-fit: cover;">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted small mb-4">Tidak ada foto lokasi yang dilampirkan.</p>
                    @endif

                    <!-- 5. LAMPIRAN FOTO KENDARAAN -->
                    <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">5. Foto Kendaraan</h5>
                    @if(is_array($report->kendaraan_photos) && count($report->kendaraan_photos) > 0)
                        <div class="row g-2 mb-3">
                            @foreach($report->kendaraan_photos as $carImg)
                                <div class="col-6 col-md-4">
                                    <a href="{{ asset('storage/' . $carImg) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $carImg) }}" alt="Foto Kendaraan" class="img-fluid rounded border shadow-sm" style="height: 140px; width: 100%; object-fit: cover;">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted small mb-0">Tidak ada foto kendaraan yang dilampirkan.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Identitas Pelapor & Tindak Lanjut -->
        <div class="col-lg-4">
            <!-- Identitas Pelapor -->
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
                            <span class="badge bg-primary bg-opacity-10 text-primary small">Masyarakat / Pelapor</span>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush small">
                        <li class="list-group-item px-0 d-flex justify-content-between">
                            <span class="text-muted"><i class="fa-regular fa-envelope me-1"></i> Email:</span>
                            <span class="fw-semibold text-dark">{{ $report->user->email ?? '-' }}</span>
                        </li>
                        <li class="list-group-item px-0 d-flex justify-content-between">
                            <span class="text-muted"><i class="fa-solid fa-phone me-1"></i> No. HP:</span>
                            <span class="fw-semibold text-dark">{{ $report->pelapor_phone ?? ($report->user->phone ?? '-') }}</span>
                        </li>
                        <li class="list-group-item px-0">
                            <span class="text-muted d-block mb-1"><i class="fa-solid fa-location-dot me-1"></i> Alamat Pelapor:</span>
                            @if(is_array($report->pelapor_address))
                                <span class="fw-semibold text-dark">{{ implode(', ', array_filter($report->pelapor_address)) ?: '-' }}</span>
                            @else
                                <span class="fw-semibold text-dark">{{ $report->pelapor_address ?? '-' }}</span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Tindak Lanjut Status -->
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold text-dark mb-3">Tindak Lanjut Laporan</h5>
                    <form action="{{ route('admin.reports.status', $report->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Status</label>
                            <select name="status" class="form-select">
                                <option value="pending" {{ $report->status == 'pending' ? 'selected' : '' }}>Menunggu (Pending)</option>
                                <option value="diproses" {{ $report->status == 'diproses' ? 'selected' : '' }}>Diproses (Diselidiki)</option>
                                <option value="selesai" {{ $report->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="ditolak" {{ $report->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Catatan Tindak Lanjut</label>
                            <textarea name="admin_notes" rows="4" class="form-control" placeholder="Tuliskan catatan disposisi intelijen/pemberantasan...">{{ $report->admin_notes }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 fw-semibold">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Status
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
