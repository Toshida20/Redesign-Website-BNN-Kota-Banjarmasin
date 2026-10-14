@extends('layouts.master')

@section('title', 'Pelaporan Gratifikasi - BNN Kota Banjarmasin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4 p-md-5">
                    <h3 class="fw-bold mb-2" style="color: #4b5563;">Pelaporan Gratifikasi</h3>
                    <p class="text-muted mb-4">Mekanisme pelaporan pemberian, penerimaan, atau penolakan gratifikasi (hadiah/fasilitas) dalam penyelenggaraan tugas di BNN Kota Banjarmasin demi mewujudkan integritas bebas korupsi.</p>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('lapor.gratifikasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Jenis / Pokok Gratifikasi <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="Contoh: Pemberian parsel / uang tunai / fasilitas..." value="{{ old('title') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tanggal Kejadian / Penerimaan</label>
                            <input type="date" name="incident_date" class="form-control" value="{{ old('incident_date', date('Y-m-d')) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tempat / Acara Penyerahan</label>
                            <input type="text" name="incident_location" class="form-control" placeholder="Contoh: Kantor BNN / Acara Sosialisasi" value="{{ old('incident_location') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Pihak Pemberi / Penerima (Opsional)</label>
                            <input type="text" name="suspect_name" class="form-control" placeholder="Nama pihak / instansi terkait" value="{{ old('suspect_name') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Uraian / Kronologi Peristiwa <span class="text-danger">*</span></label>
                            <textarea name="description" rows="5" class="form-control" placeholder="Jelaskan detail peristiwa gratifikasi..." required>{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Lampiran Bukti (Foto Barang/Kwitansi/Dokumen)</label>
                            <input type="file" name="evidence_file" class="form-control" accept="image/*,.pdf,.doc,.docx">
                            <small class="text-muted">Maksimal 10MB. Format: JPG, PNG, atau PDF.</small>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ url('/') }}" class="btn btn-light px-4">Batal</a>
                            <button type="submit" class="btn btn-primary px-4 fw-semibold">Kirim Laporan Gratifikasi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-label {
        color: #4b5563;
        font-size: 14px;
        margin-bottom: 6px;
    }
    .form-control, .form-select {
        border: 1px solid #737373;
        border-radius: 4px;
        font-size: 14px;
        color: #222222;
    }
    .form-control::placeholder {
        color: #737373;
        font-size: 13.5px;
    }
    .form-control:focus, .form-select:focus {
        border-color: #174b83;
        box-shadow: 0 0 0 2px rgba(23, 75, 131, 0.15);
    }
</style>
@endsection
