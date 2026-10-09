@extends('layouts.master')

@section('title', 'LHKPN BNN Kota Banjarmasin')

@section('content')
<div class="container mt-5 mb-5" style="padding-top: 15px;">
    
    @include('layouts.main.navigation-bar.main-informasi-profil')
    
    @php
        $lhkpnTableData = [
            [
                'no' => '1.',
                'jabatan' => 'Kepala Badan Narkotika Nasional Republik Indonesia',
                'reports' => [
                    ['tahun' => 'LHKPN Tahun 2025', 'link' => url('/lhkpn-report')],
                    ['tahun' => 'LHKPN Tahun 2022', 'link' => url('/lhkpn-report')],
                ]
            ],
            [
                'no' => '2.',
                'jabatan' => 'Sekretaris Utama Badan Narkotika Nasional Republik Indonesia',
                'reports' => [
                    ['tahun' => 'LHKPN Tahun 2025', 'link' => url('/lhkpn-report')],
                    ['tahun' => 'LHKPN Tahun 2024', 'link' => url('/lhkpn-report')],
                ]
            ],
            [
                'no' => '3.',
                'jabatan' => 'Inspektur Utama Badan Narkotika Nasional Republik Indonesia',
                'reports' => [
                    ['tahun' => 'LHKPN Tahun 2025', 'link' => url('/lhkpn-report')],
                    ['tahun' => 'LHKPN Tahun 2024', 'link' => url('/lhkpn-report')],
                ]
            ],
            [
                'no' => '4.',
                'jabatan' => 'Deputi Pencegahan',
                'reports' => [
                    ['tahun' => 'LHKPN Tahun 2025', 'link' => url('/lhkpn-report')],
                    ['tahun' => 'LHKPN Tahun 2024', 'link' => url('/lhkpn-report')],
                ]
            ],
            [
                'no' => '5.',
                'jabatan' => 'Deputi Pemberdayaan Masyarakat',
                'reports' => [
                    ['tahun' => 'LHKPN Tahun 2025', 'link' => url('/lhkpn-report')],
                ]
            ],
            [
                'no' => '6.',
                'jabatan' => 'Deputi Pemberantasan',
                'reports' => []
            ],
            [
                'no' => '7.',
                'jabatan' => 'Deputi Rehabilitasi',
                'reports' => [
                    ['tahun' => 'LHKPN Tahun 2025', 'link' => url('/lhkpn-report')],
                    ['tahun' => 'LHKPN Tahun 2024', 'link' => url('/lhkpn-report')],
                ]
            ],
            [
                'no' => '8.',
                'jabatan' => 'Deputi Hukum dan Kerjasama',
                'reports' => [
                    ['tahun' => 'LHKPN Tahun 2025', 'link' => url('/lhkpn-report')],
                    ['tahun' => 'LHKPN Tahun 2024', 'link' => url('/lhkpn-report')],
                ]
            ],
        ];

        $lhkpnTerkiniList = [
            [
                'image' => 'bnn-featured-thumbnail.jpg',
                'title'  => 'Jumlah, Jenis, dan gambaran umum pelanggaran yang dilaporkan oleh masyarakat serta laporan penindakannya',
                'date'   => '20 Agustus 2026',
                'link'   => url('/lhkpn-report')
            ],
            [
                'image' => 'bnn-featured-thumbnail.jpg',
                'title'  => 'Jumlah, Jenis, dan gambaran umum pelanggaran yang dilaporkan oleh masyarakat serta laporan penindakannya',
                'date'   => '18 Agustus 2026',
                'link'   => url('/lhkpn-report')
            ],
            [
                'image' => 'bnn-featured-thumbnail.jpg',
                'title'  => 'Jumlah, Jenis, dan gambaran umum pelanggaran yang dilaporkan oleh masyarakat serta laporan penindakannya',
                'date'   => '18 Agustus 2026',
                'link'   => url('/lhkpn-report')
            ],
        ];

        $lhkpnPopulerList = [
            [
                'image' => 'bnn-featured-thumbnail.jpg',
                'title'  => 'Tahap Pelaksanaan Tahun 2026',
                'date'   => '15 Agustus 2026',
                'link'   => url('/lhkpn-report')
            ],
            [
                'image' => 'bnn-featured-thumbnail.jpg',
                'title'  => 'Tahap Pemilihan Tahun 2026',
                'date'   => '20 Agustus 2026',
                'link'   => url('/lhkpn-report')
            ],
            [
                'image' => 'bnn-featured-thumbnail.jpg',
                'title'  => 'Persiapan Pilkada Tahun 2026',
                'date'   => '25 Agustus 2026',
                'link'   => url('/lhkpn-report')
            ],
        ];
    @endphp

    <div class="content-sejarah mt-4 text-center">
        <h2 class="fw-bold mb-4" style="color: #444;">Informasi Publik Tersedia Berkala</h2>
    </div>

    <div class="row mt-4">
        <!-- Main Content: Table -->
        <div class="col-lg-8 mb-4">
            <div class="table-responsive">
                <table class="custom-lhkpn-table">
                    <thead>
                        <tr>
                            <th colspan="3" class="text-center py-2">Laporan Harta Kekayaan Pejabat Negara di Lingkungan BNN RI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lhkpnTableData as $row)
                            <tr>
                                <td class="text-center" style="width: 40px;">{{ $row['no'] }}</td>
                                <td>{{ $row['jabatan'] }}</td>
                                <td style="width: 70px;"></td>
                            </tr>
                            @foreach($row['reports'] as $report)
                            <tr>
                                <td></td>
                                <td>{{ $report['tahun'] }}</td>
                                <td class="text-center">
                                    <a href="{{ $report['link'] }}" style="text-decoration: none; color: #174b83; font-weight: 500;">Lihat</a>
                                </td>
                            </tr>
                            
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Sidebar: Terkini & Populer -->
        <div class="col-lg-4 px-lg-4" style="padding-right: 1.5rem !important; padding-left: 2.5rem !important; width: 380px;">
            <h4 class="lkhpn-report-tagline">Terkini</h4>
            @foreach($lhkpnTerkiniList as $terkini)
                <a href="{{ $terkini['link'] }}" class="thumbnail-lhkpn-report">
                    <img src="{{ asset('images/' . $terkini['image']) }}" alt="Thumbnail">
                    <div class="thumbnail-overlay">
                        <h4>{{ $terkini['title'] }}</h4>
                        <p>{{ $terkini['date'] }}</p>
                    </div>
                </a>
            @endforeach

            <h4 class="lkhpn-report-tagline mt-4">Populer</h4>
            @foreach($lhkpnPopulerList as $populer)
                <a href="{{ $populer['link'] }}" class="thumbnail-lhkpn-report">
                    <img src="{{ asset('images/' . $populer['image']) }}" alt="Thumbnail">
                    <div class="thumbnail-overlay">
                        <h4>{{ $populer['title'] }}</h4>
                        <p>{{ $populer['date'] }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
