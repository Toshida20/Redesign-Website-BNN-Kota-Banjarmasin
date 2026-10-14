@extends('layouts.master')

@section('title', 'Whistleblowing & Layanan Publik - Panel Admin')

@section('content')
<div class="container-fluid py-4 px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-1">
                    <li class="breadcrumb-item"><a href="{{ route('admin.reports') }}">Lihat Laporan</a></li>
                    <li class="breadcrumb-item active">Whistleblowing & Layanan Publik</li>
                </ol>
            </nav>
            <h3 class="fw-bold text-dark mb-0">Daftar Whistleblowing & Pengaduan Pelayanan</h3>
        </div>
        <a href="{{ route('admin.reports') }}" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <!-- Filter Card -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-3 p-md-4">
            <form action="{{ route('admin.reports.whistleblowing') }}" method="GET" class="row g-2 align-items-end">
                <div class="col-6 col-md-2">
                    <label class="form-label small fw-semibold text-muted mb-1">Tanggal</label>
                    <select name="day" class="form-select form-select-sm">
                        <option value="">Semua Tanggal</option>
                        @for($d = 1; $d <= 31; $d++)
                            <option value="{{ sprintf('%02d', $d) }}" {{ request('day') == sprintf('%02d', $d) ? 'selected' : '' }}>{{ $d }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-6 col-md-2">
                    <label class="form-label small fw-semibold text-muted mb-1">Bulan</label>
                    <select name="month" class="form-select form-select-sm">
                        <option value="">Semua Bulan</option>
                        @php
                            $months = ['01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'];
                        @endphp
                        @foreach($months as $key => $name)
                            <option value="{{ $key }}" {{ request('month') == $key ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 col-md-2">
                    <label class="form-label small fw-semibold text-muted mb-1">Tahun</label>
                    <select name="year" class="form-select form-select-sm">
                        <option value="">Semua Tahun</option>
                        @for($y = date('Y'); $y >= 2024; $y--)
                            <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-6 col-md-2">
                    <label class="form-label small fw-semibold text-muted mb-1">Status</label>
                    <select name="status" class="form-select form-select-sm">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu</option>
                        <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>
                <div class="col-12 col-md-3">
                    <label class="form-label small fw-semibold text-muted mb-1">Cari Kata Kunci</label>
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Ketik kata kunci..." value="{{ request('search') }}">
                </div>
                <div class="col-12 col-md-1 d-flex gap-1">
                    <button type="submit" class="btn btn-sm btn-primary w-100"><i class="fa-solid fa-filter"></i></button>
                    @if(request()->hasAny(['day', 'month', 'year', 'status', 'search']))
                        <a href="{{ route('admin.reports.whistleblowing') }}" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-rotate-left"></i></a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- Table -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4" style="width: 60px;">No</th>
                        <th>Pengirim (Pelapor)</th>
                        <th>No. Tiket & Judul Pengaduan</th>
                        <th>Tgl Kirim</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reports as $index => $item)
                        <tr>
                            <td class="ps-4 fw-semibold text-muted">{{ $reports->firstItem() + $index }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        @if($item->user && $item->user->avatar)
                                            <img src="{{ asset($item->user->avatar) }}" alt="{{ $item->user->name }}" class="rounded-circle object-fit-cover shadow-sm" width="45" height="45">
                                        @else
                                            <img src="{{ asset('images/assets/public/logo/bnn-250x250.avif') }}" alt="Avatar" class="rounded-circle object-fit-cover shadow-sm" width="45" height="45">
                                        @endif
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">{{ $item->user->name ?? 'Pengguna' }}</div>
                                        <div class="text-muted small"><i class="fa-regular fa-envelope me-1"></i>{{ $item->user->email ?? '-' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-primary border mb-1">{{ $item->ticket_number }}</span>
                                <div class="fw-semibold text-dark text-truncate" style="max-width: 250px;">{{ $item->title }}</div>
                            </td>
                            <td>
                                <div class="small text-dark">{{ $item->created_at->format('d M Y') }}</div>
                                <div class="small text-muted">{{ $item->created_at->format('H:i') }} WITA</div>
                            </td>
                            <td>
                                @if($item->status == 'pending')
                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                @elseif($item->status == 'diproses')
                                    <span class="badge bg-info text-white">Diproses</span>
                                @elseif($item->status == 'selesai')
                                    <span class="badge bg-success">Selesai</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.reports.show', $item->id) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">Belum ada pengaduan whistleblowing yang tercatat.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($reports->hasPages())
            <div class="p-3 border-top d-flex justify-content-end">{{ $reports->links() }}</div>
        @endif
    </div>
</div>
@endsection
