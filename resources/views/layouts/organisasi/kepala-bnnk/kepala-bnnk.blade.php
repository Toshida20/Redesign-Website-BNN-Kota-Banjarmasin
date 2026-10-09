@extends('layouts.master')

@section('title', 'Kepala-kepala - BNN Kota Banjarmasin')

@section('content')
<div class="container mt-5 mb-5" style="padding-top: 40px;">

    @include('layouts.main.navigation-bar.main-media-social')
    <div class="content-sejarah mt-4 text-center">
        <h2 class="fw-bold mb-4" style="color: #444;">Kepala BNNK dari Masa Ke Masa</h2>
    </div>
</div>

<div class="timeline-container" id="timeline-container">
    <div class="timeline-line-bg"></div>
    <div class="timeline-line-fill" id="timeline-line-fill"></div>

    @php
        $kepalaList = [
            [
                'nama'                 => 'Komisaris Besar Polisi Wuryantono, S.I.K.,MH',
                'foto'                 => 'Wuryantono.jpeg',
                'tempat-tanggal-lahir' => 'Madiun, 3 September 1977',
                'agama'                => 'Islam',
                'pendidikan'           => 'S2 Mangister Hukum',
                'mulai-menjabat'       => '15 November 2023 s.d Sekarang',
            ],
            [
                'nama'                 => 'Komisaris Besar Polisi Wuryantono, S.I.K.,MH',
                'foto'                 => 'Wuryantono.jpeg',
                'tempat-tanggal-lahir' => 'Madiun, 3 September 1977',
                'agama'                => 'Islam',
                'pendidikan'           => 'S2 Mangister Hukum',
                'mulai-menjabat'       => '15 November 2023 s.d Sekarang',
            ],
            [
                'nama'                 => 'Komisaris Besar Polisi Wuryantono, S.I.K.,MH',
                'foto'                 => 'Wuryantono.jpeg',
                'tempat-tanggal-lahir' => 'Madiun, 3 September 1977',
                'agama'                => 'Islam',
                'pendidikan'           => 'S2 Mangister Hukum',
                'mulai-menjabat'       => '15 November 2023 s.d Sekarang',
            ],
            [
                'nama'                 => 'Komisaris Besar Polisi Wuryantono, S.I.K.,MH',
                'foto'                 => 'Wuryantono.jpeg',
                'tempat-tanggal-lahir' => 'Madiun, 3 September 1977',
                'agama'                => 'Islam',
                'pendidikan'           => 'S2 Mangister Hukum',
                'mulai-menjabat'       => '15 November 2023 s.d Sekarang',
            ],
            [
                'nama'                 => 'Komisaris Besar Polisi Wuryantono, S.I.K.,MH',
                'foto'                 => 'Wuryantono.jpeg',
                'tempat-tanggal-lahir' => 'Madiun, 3 September 1977',
                'agama'                => 'Islam',
                'pendidikan'           => 'S2 Mangister Hukum',
                'mulai-menjabat'       => '15 November 2023 s.d Sekarang',
            ],
            [
                'nama'                 => 'Komisaris Besar Polisi Wuryantono, S.I.K.,MH',
                'foto'                 => 'Wuryantono.jpeg',
                'tempat-tanggal-lahir' => 'Madiun, 3 September 1977',
                'agama'                => 'Islam',
                'pendidikan'           => 'S2 Mangister Hukum',
                'mulai-menjabat'       => '15 November 2023 s.d Sekarang',
            ],
            [
                'nama'                 => 'Komisaris Besar Polisi Wuryantono, S.I.K.,MH',
                'foto'                 => 'Wuryantono.jpeg',
                'tempat-tanggal-lahir' => 'Madiun, 3 September 1977',
                'agama'                => 'Islam',
                'pendidikan'           => 'S2 Mangister Hukum',
                'mulai-menjabat'       => '15 November 2023 s.d Sekarang',
            ],
        ];
    @endphp

    @foreach($kepalaList as $index => $kepala)
    <div class="timeline-item {{ $index % 2 == 0 ? 'left' : 'right' }}">
        <div class="timeline-checkpoint">
            <div class="checkpoint-border-fill"></div>
        </div>
        <div class="timeline-half">
            <button class="timeline-card card-profile"
            
                data-bs-toggle="modal"
                data-bs-target="#modalKepala"
                data-nama="{{ $kepala['nama'] }}"
                data-foto="{{ asset('images/' . $kepala['foto']) }}"
                data-tempat-tanggal-lahir="{{ $kepala['tempat-tanggal-lahir'] }}"
                data-agama="{{ $kepala['agama'] }}"
                data-pendidikan="{{ $kepala['pendidikan'] }}"
                data-mulai-menjabat="{{ $kepala['mulai-menjabat'] }}">

                <div class="timeline-arrow"></div>
                <div class="timeline-card-inner">
                    <img src="{{ asset('images/' . $kepala['foto']) }}" alt="Kepala">
                    <div class="overlay-gradient"></div>
                    <h3>{{ $kepala['nama'] }}</h3>
                </div>
            </button>
        </div>
    </div>
    @endforeach
</div>

<!-- Modal Detail Biografi -->
<div class="modal fade" id="modalKepala" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-kepala-dialog">
        <div class="modal-kepala-content">
            <!-- <div class="modal-kepala-triangle"></div> -->
            <button type="button" class="modal-kepala-close" data-bs-dismiss="modal" aria-label="Close">
                <img src="{{ asset('images/assets/public/button/close-black.png') }}" alt="Close">
            </button>
            <div class="modal-kepala-body">
                <h4 class="modal-kepala-title">Detail Biografi</h4>
                <div class="modal-kepala-row">
                    <div class="modal-kepala-foto-wrapper">
                        <img id="modal-foto" src="" alt="Foto Kepala" class="modal-kepala-foto">
                    </div>
                    <div class="modal-kepala-info">
                        <table class="modal-kepala-table">
                            <tr>
                                <td class="modal-kepala-label">Nama Lengkap</td>
                                <td class="modal-kepala-colon">:</td>
                                <td id="modal-nama" class="modal-kepala-value"></td>
                            </tr>
                            <tr>
                                <td class="modal-kepala-label">Tempat dan Tanggal Lahir</td>
                                <td class="modal-kepala-colon">:</td>
                                <td id="modal-tempat-tanggal-lahir" class="modal-kepala-value"></td>
                            </tr>
                            <tr>
                                <td class="modal-kepala-label">Agama</td>
                                <td class="modal-kepala-colon">:</td>
                                <td id="modal-agama" class="modal-kepala-value"></td>
                            </tr>
                            <tr>
                                <td class="modal-kepala-label">Pendidikan</td>
                                <td class="modal-kepala-colon">:</td>
                                <td id="modal-pendidikan" class="modal-kepala-value"></td>
                            </tr>
                            <tr>
                                <td class="modal-kepala-label">Mulai Menjabat</td>
                                <td class="modal-kepala-colon">:</td>
                                <td id="modal-mulai-menjabat" class="modal-kepala-value"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
