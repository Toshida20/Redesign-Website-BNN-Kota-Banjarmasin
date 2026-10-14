@extends('layouts.master')

@section('title', 'Formulir Lapor P4GN - BNN Kota Banjarmasin')

@section('content')
<div class="container mt-4 mb-5" style="padding-top: 80px;">

    @include('layouts.main.navigation-bar.main-media-social')

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="p4gn-page-container">

        <div class="p4gn-header-intro">
            <h2 class="p4gn-title">Formulir Lapor P4GN</h2>
            <p class="p4gn-legal-text">
                Dukung Gerakan <strong>P4GN</strong> (Pencegahan Pemberantasan Penyalahgunaan dan Peredaran Gelap Narkotika dan Prekursor Narkotika) dengan <strong>melaporkan penyalahgunaan narkotika!</strong>
            </p>
            <p class="p4gn-intro-desc">
                Untuk bisa menindak lanjuti laporan anda, kami perlu informasi lebih lengkap. Mohon mengisi data-data yang akurat sesuai yang diperlukan. <strong>Data yang Anda kirimkan akan kami rahasiakan sepenuhnya.</strong>
            </p>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><i class="fa-solid fa-triangle-exclamation me-1"></i> Terjadi kesalahan pengisian formulir:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Wrapper Form & Sticky Blurred Overlay --}}
        <div class="p4gn-wrapper">
            {{-- Overlay Blur + Sticky Hero untuk Tamu / User yang Belum Login --}}
            @guest
                <div class="p4gn-blurred-overlay">
                    <div class="p4gn-sticky-hero">
                        <h3 class="hero-blur-title">Masuk Untuk Melapor<br>Penyalahgunaan Narkoba</h3>
                        <p class="hero-blur-desc">
                            Untuk Menjaga Keamanan Dan Memudahkan Pengelolaan Pengaduan, Anda Perlu Masuk Ke Akun Terlebih Dahulu.
                        </p>
                        <a href="{{ route('login') }}" class="button-masuk">Masuk</a>
                    </div>
                </div>
            @endguest

            <form action="{{ route('lapor.narkoba.store') }}" method="POST" enctype="multipart/form-data" class="p4gn-form @guest form-blurred @endguest">
                @csrf

                <div class="p4gn-section">
                    <h3 class="p4gn-section-heading">Identitas Pelapor</h3>

                    <div class="p4gn-form-group">
                        <label class="p4gn-field-label">Nomor Telepon Pelapor</label>
                        @guest
                            <input type="text" class="p4gn-input" value="Mengambil Langsung" placeholder="Mengambil Langsung" disabled>
                        @else
                            <input type="text" name="pelapor_phone" class="p4gn-input" value="{{ old('pelapor_phone', Auth::user()->phone ?? '') }}" placeholder="Contoh: 081212345678">
                        @endguest
                    </div>

                    <div class="p4gn-form-group">
                        <label class="p4gn-field-label">Alamat Pelapor</label>
                        <div class="address-input-stack">
                            <input type="text" name="pelapor_jalan" class="p4gn-input mb-2" placeholder="Nama Jalan/Gedung/Lokasi" value="{{ old('pelapor_jalan') }}">
                            <input type="text" name="pelapor_wilayah" class="p4gn-input mb-2" placeholder="Desa/Kelurahan/Kecamatan" value="{{ old('pelapor_wilayah') }}">
                            <div class="row g-2 mb-2">
                                <div class="col-6">
                                    <input type="text" name="pelapor_kota" class="p4gn-input" placeholder="Kabupaten/Kota" value="{{ old('pelapor_kota') }}">
                                </div>
                                <div class="col-6">
                                    <input type="text" name="pelapor_provinsi" class="p4gn-input" placeholder="Provinsi" value="{{ old('pelapor_provinsi') }}">
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-6">
                                    <input type="text" name="pelapor_kodepos" class="p4gn-input" placeholder="Kode Pos" value="{{ old('pelapor_kodepos') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p4gn-section">
                    <h3 class="p4gn-section-heading">Identitas Terlapor</h3>

                    <div class="p4gn-form-group">
                        <label class="p4gn-field-label">Nama Terlapor</label>
                        <input type="text" name="terlapor_name" class="p4gn-input" placeholder="" value="{{ old('terlapor_name') }}">
                    </div>

                    <div class="p4gn-form-group">
                        <label class="p4gn-field-label">Nomor Telepon Terlapor</label>
                        <input type="text" name="terlapor_phone" class="p4gn-input" placeholder="Contoh: 081212345678" value="{{ old('terlapor_phone') }}">
                    </div>

                    <div class="p4gn-form-group">
                        <label class="p4gn-field-label">Alamat Terlapor</label>
                        <div class="address-input-stack">
                            <input type="text" name="terlapor_jalan" class="p4gn-input mb-2" placeholder="Nama Jalan/Gedung/Lokasi" value="{{ old('terlapor_jalan') }}">
                            <input type="text" name="terlapor_wilayah" class="p4gn-input mb-2" placeholder="Desa/Kelurahan/Kecamatan" value="{{ old('terlapor_wilayah') }}">
                            <div class="row g-2 mb-2">
                                <div class="col-6">
                                    <input type="text" name="terlapor_kota" class="p4gn-input" placeholder="Kabupaten/Kota" value="{{ old('terlapor_kota') }}">
                                </div>
                                <div class="col-6">
                                    <input type="text" name="terlapor_provinsi" class="p4gn-input" placeholder="Provinsi" value="{{ old('terlapor_provinsi') }}">
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-6">
                                    <input type="text" name="terlapor_kodepos" class="p4gn-input" placeholder="Kode Pos" value="{{ old('terlapor_kodepos') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p4gn-section">
                    <h3 class="p4gn-section-heading">Upload Foto Lokasi</h3>
                    <div class="p4gn-dropzone" onclick="document.getElementById('inputFotoLokasi').click()">
                        <input type="file" id="inputFotoLokasi" name="lokasi_photos[]" multiple accept="image/*" style="display: none;" onchange="handleFileSelect(this, 'previewLokasiBox')">
                        <div class="dropzone-content">
                            <div class="dropzone-icon">
                                <i class="fa-regular fa-folder-open"></i>
                            </div>
                            <div class="dropzone-text">Click or drag files to this area to upload.</div>
                            <div class="dropzone-sub">You can upload up to 5 files.</div>
                        </div>
                    </div>
                    <div id="previewLokasiBox" class="p4gn-file-preview-list mt-2"></div>
                </div>

                <div class="p4gn-section">
                    <div class="p4gn-form-group">
                        <label class="p4gn-field-label">Jenis Narkoba</label>
                        <div class="p4gn-checkbox-group">
                            @php
                                $standardNarkoba = ['Sabu', 'Ganja', 'Ekstasi', 'Heroin', 'Obat-Obatan'];
                                $isLainnyaChecked = is_array(old('jenis_narkoba')) && in_array('Lainnya', old('jenis_narkoba'));
                            @endphp
                            @foreach($standardNarkoba as $item)
                                <label class="p4gn-checkbox-item">
                                    <input type="checkbox" name="jenis_narkoba[]" value="{{ $item }}" {{ is_array(old('jenis_narkoba')) && in_array($item, old('jenis_narkoba')) ? 'checked' : '' }}>
                                    <span>{{ $item }}</span>
                                </label>
                            @endforeach

                            {{-- Checkbox Lainnya dengan toggle fade --}}
                            <label class="p4gn-checkbox-item">
                                <input type="checkbox" name="jenis_narkoba[]" value="Lainnya" id="checkJenisLainnya" {{ $isLainnyaChecked ? 'checked' : '' }} onchange="toggleJenisNarkobaLainnya(this)">
                                <span>Lainnya</span>
                            </label>
                        </div>

                        {{-- Kolom Pengisian Baru Muncul jika Diklik Lainnya --}}
                        <div id="wrapperJenisNarkobaLainnya" class="p4gn-fade-wrapper {{ $isLainnyaChecked ? 'is-visible' : '' }}">
                            <label class="p4gn-field-label mt-3">
                                Mohon Disebutkan Apabila Termasuk Kategori Lainnya <span class="text-danger">*</span>
                            </label>
                            <textarea name="jenis_narkoba_lainnya" id="inputJenisNarkobaLainnya" rows="3" class="p4gn-input p4gn-textarea">{{ old('jenis_narkoba_lainnya') }}</textarea>
                        </div>
                    </div>

                    <div class="p4gn-form-group">
                        <label class="p4gn-field-label">Banyaknya/Jumlah Narkoba <span class="text-danger">*</span></label>
                        <input type="text" name="jumlah_narkoba" class="p4gn-input" value="{{ old('jumlah_narkoba') }}">
                    </div>

                    <div class="p4gn-form-group">
                        <label class="p4gn-field-label">Peran Terlapor <span class="text-danger">*</span></label>
                        @php
                            $selectedPeran = old('peran_terlapor');
                            $isPeranLainnya = $selectedPeran === 'Lainnya';
                        @endphp
                        <select name="peran_terlapor" id="selectPeranTerlapor" class="p4gn-select" onchange="togglePeranTerlaporLainnya(this)">
                            <option value="" disabled {{ $selectedPeran ? '' : 'selected' }}>- Pengguna -</option>
                            <option value="Pengguna" {{ $selectedPeran == 'Pengguna' ? 'selected' : '' }}>Pengguna</option>
                            <option value="Bandar" {{ $selectedPeran == 'Bandar' ? 'selected' : '' }}>Bandar</option>
                            <option value="Pengedar" {{ $selectedPeran == 'Pengedar' ? 'selected' : '' }}>Pengedar</option>
                            <option value="Kurir" {{ $selectedPeran == 'Kurir' ? 'selected' : '' }}>Kurir</option>
                            <option value="Lainnya" {{ $isPeranLainnya ? 'selected' : '' }}>Lainnya</option>
                        </select>

                        {{-- Kolom Pengisian Baru Muncul jika Peran Terlapor = Lainnya --}}
                        <div id="wrapperPeranTerlaporLainnya" class="p4gn-fade-wrapper {{ $isPeranLainnya ? 'is-visible' : '' }}">
                            <label class="p4gn-field-label mt-3">
                                Mohon Disebutkan Apabila Termasuk Kategori Lainnya <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="peran_terlapor_lainnya" id="inputPeranTerlaporLainnya" class="p4gn-input" value="{{ old('peran_terlapor_lainnya') }}">
                        </div>
                    </div>

                    <div class="p4gn-form-group">
                        <label class="p4gn-field-label">Profesi/Pekerjaan Terlapor</label>
                        <input type="text" name="pekerjaan_terlapor" class="p4gn-input" value="{{ old('pekerjaan_terlapor') }}">
                    </div>

                    <div class="p4gn-form-group">
                        <label class="p4gn-field-label">Alamat Terlapor</label>
                        <div class="address-input-stack">
                            <input type="text" name="kejadian_jalan" class="p4gn-input mb-2" placeholder="Nama Jalan/Gedung/Lokasi" value="{{ old('kejadian_jalan') }}">
                            <input type="text" name="kejadian_wilayah" class="p4gn-input mb-2" placeholder="Desa/Kelurahan/Kecamatan" value="{{ old('kejadian_wilayah') }}">
                            <div class="row g-2 mb-2">
                                <div class="col-6">
                                    <input type="text" name="kejadian_kota" class="p4gn-input" placeholder="Kabupaten/Kota" value="{{ old('kejadian_kota') }}">
                                </div>
                                <div class="col-6">
                                    <input type="text" name="kejadian_provinsi" class="p4gn-input" placeholder="Provinsi" value="{{ old('kejadian_provinsi') }}">
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-6">
                                    <input type="text" name="kejadian_kodepos" class="p4gn-input" placeholder="Kode Pos" value="{{ old('kejadian_kodepos') }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p4gn-form-group">
                        <label class="p4gn-field-label">Jenis Kendaraan Yang Sering Digunakan Beserta Nomor Plat Kendaraan</label>
                        <input type="text" name="kendaraan_terlapor" class="p4gn-input" value="{{ old('kendaraan_terlapor') }}">
                    </div>
                </div>

                <!-- upload foto kendaraan -->
                <div class="p4gn-section">
                    <h3 class="p4gn-section-heading">Upload Foto Kendaraan</h3>
                    <div class="p4gn-dropzone" onclick="document.getElementById('inputFotoKendaraan').click()">
                        <input type="file" id="inputFotoKendaraan" name="kendaraan_photos[]" multiple accept="image/*" style="display: none;" onchange="handleFileSelect(this, 'previewKendaraanBox')">
                        <div class="dropzone-content">
                            <div class="dropzone-icon">
                                <i class="fa-regular fa-folder-open"></i>
                            </div>
                            <div class="dropzone-text">Click or drag files to this area to upload.</div>
                            <div class="dropzone-sub">You can upload up to 5 files.</div>
                        </div>
                    </div>
                    <div id="previewKendaraanBox" class="p4gn-file-preview-list mt-2"></div>
                </div>

                <div class="p4gn-section">
                    <div class="p4gn-form-group">
                        <label class="p4gn-field-label">Uraian Cara Pengedaran/Transaksinya</label>
                        <input type="text" name="uraian_transaksi" class="p4gn-input" value="{{ old('uraian_transaksi') }}">
                    </div>

                    <div class="p4gn-form-group">
                        <label class="p4gn-field-label">Lokasi Terlapor Sering Terlihat/Berkeliaran/Nongkrong</label>
                        <input type="text" name="lokasi_nongkrong" class="p4gn-input" value="{{ old('lokasi_nongkrong') }}">
                    </div>

                    <div class="p4gn-form-group">
                        <label class="p4gn-field-label">Dari Mana Informasi Tersebut Anda Dapatkan?</label>
                        <input type="text" name="sumber_informasi" class="p4gn-input" value="{{ old('sumber_informasi') }}">
                    </div>

                    <div class="p4gn-form-group mt-4">
                        <label class="p4gn-field-label">Pernyataan</label>
                        <label class="p4gn-checkbox-item">
                            <input type="checkbox" name="pernyataan_valid" value="1" required {{ old('pernyataan_valid') ? 'checked' : '' }}>
                            <span>Data Yang Saya Berikan Benar Dan Dapat Dipertanggung Jawabkan</span>
                        </label>
                    </div>

                    @auth
                        <div class="form-submit-wrapper text-center mt-4">
                            <button type="submit" class="button-kirim">Kirim</button>
                        </div>
                    @endauth
                </div>
            </form>
        </div>
    </div>
</div>

@endsection