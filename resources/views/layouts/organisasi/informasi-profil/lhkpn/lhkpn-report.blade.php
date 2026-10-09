@extends('layouts.master')

@section('title', 'Laporan LHKPN BNN Kota Banjarmasin')

@section('content')
<div class="container mt-5 mb-5" style="padding-top: 15px;">
    
    @include('layouts.main.navigation-bar.main-informasi-profil')

    @php
        $currentArticle = [
            'title' => 'Jumlah, Jenis, Dan Gambaran Umum Pelanggaran Yang Dilaporkan Oleh Masyarakat Serta Laporan Penindakannya',
            'image' => 'bnn-featured-thumbnail.jpg',
            'author' => 'Admin BNNK',
            'date' => '21 Agustus 2026',
            'tags' => ['Pengadaan Barang dan Jasa', 'Tahap Pemilihan'],
            'hashtags' => '#BNN #StopNarkoba #CegahNarkoba'
        ];

        $reportSections = [
            [
                'no' => '1.',
                'title' => 'PENGADAAN REAGEN DAN BAHAN/ BARANG CONSUMABLE PEMERIKSAAN UJI NARKOTIKA, PSIKOTROPIKA, PREKURSOR DAN BAHAN ADIKTIF LAINNYA.',
                'rows' => [
                    [
                        'no' => '1.',
                        'document_name' => 'Dokumen Kontrak yang telah ditandatangani beserta Perubahan Kontrak yang tidak mengandung informasi yang dikecualikan',
                        'file_link' => url('/#'),
                        'remarks' => ''
                    ],
                    [
                        'no' => '2.',
                        'document_name' => 'Ringkasan Kontrak yang sekurang-kurangnya mencantumkan informasi mengenai para pihak yang bertandatangan, nama direktur dan pemilik usaha, alamat penyedia, nomor pokok wajib pajak, nilai kontrak, rincian pekerjaan, spesifikasi pekerjaan, lokasi pekerjaan, waktu pekerjaan, sumber dana, jenis kontrak, serta ringkasan perubahan kontrak',
                        'file_link' => url('/#'),
                        'remarks' => ''
                    ],
                    [
                        'no' => '3.',
                        'document_name' => 'Surat Perintah Mulai Kerja',
                        'file_link' => url('/#'),
                        'remarks' => ''
                    ],
                    [
                        'no' => '3.',
                        'document_name' => 'Surat Perintah Mulai Kerja',
                        'file_link' => url('/#'),
                        'remarks' => ''
                    ],
                    [
                        'no' => '3.',
                        'document_name' => 'Surat Perintah Mulai Kerja',
                        'file_link' => url('/#'),
                        'remarks' => ''
                    ],
                    [
                        'no' => '3.',
                        'document_name' => 'Surat Perintah Mulai Kerja',
                        'file_link' => url('/#'),
                        'remarks' => ''
                    ],
                ]
            ],
            [
                'no' => '2.',
                'title' => 'PENGADAAN PAKAN DAN OBAT-OBATAN K-9',
                'rows' => [
                    [
                        'no' => '1.',
                        'document_name' => 'Dokumen Kontrak yang telah ditandatangani beserta Perubahan Kontrak yang tidak mengandung informasi yang dikecualikan',
                        'file_link' => url('/#'),
                        'remarks' => ''
                    ],
                    [
                        'no' => '2.',
                        'document_name' => 'Ringkasan Kontrak yang sekurang-kurangnya mencantumkan informasi mengenai para pihak yang bertandatangan, nama direktur dan pemilik usaha, alamat penyedia, nomor pokok wajib pajak, nilai kontrak, rincian pekerjaan, spesifikasi pekerjaan, lokasi pekerjaan, waktu pekerjaan, sumber dana, jenis kontrak, serta ringkasan perubahan kontrak',
                        'file_link' => url('/#'),
                        'remarks' => ''
                    ],
                    [
                        'no' => '3.',
                        'document_name' => 'Surat Perintah Mulai Kerja',
                        'file_link' => url('/#'),
                        'remarks' => ''
                    ],
                    [
                        'no' => '3.',
                        'document_name' => 'Surat Perintah Mulai Kerja',
                        'file_link' => '',
                        'remarks' => 'Masih Dalam Proses'
                    ],
                    [
                        'no' => '3.',
                        'document_name' => 'Surat Perintah Mulai Kerja',
                        'file_link' => '',
                        'remarks' => 'Tidak dipersyaratkan'
                    ],
                    [
                        'no' => '3.',
                        'document_name' => 'Surat Perintah Mulai Kerja',
                        'file_link' => url('/#'),
                        'remarks' => ''
                    ],
                ]
            ],
        ];

        $latestNewsList = [
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
        ];

        $popularNewsList = [
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
                'title'  => 'BNN GANDENG APJII PERANGI PEREDARAN NARKOTIKA DI RUANG SIBER',
                'date'   => '20 Agustus 2026',
                'link'   => url('/lhkpn-report')
            ],
            [
                'image' => 'bnn-featured-thumbnail.jpg',
                'title'  => 'BNN GANDENG APJII PERANGI PEREDARAN NARKOTIKA DI RUANG SIBER',
                'date'   => '20 Agustus 2026',
                'link'   => url('/lhkpn-report')
            ],
        ];
    @endphp

    <div class="text-center mt-4 mb-4">
        <div class="article-tags mb-3">
            @foreach($currentArticle['tags'] as $tag)
                <span class="article-tag">{{ $tag }}</span>
            @endforeach
        </div>
            
        <h2 class="article-title px-md-4">{{ $currentArticle['title'] }}</h2>
        <div class="article-meta">
            Oleh {{ $currentArticle['author'] }} &nbsp;&nbsp;&nbsp; {{ $currentArticle['date'] }}
        </div>
    </div>

    <div class="row">
        <!-- Main Content: Article and Table -->
        <div class="col-lg-8 mb-4 text-center">
            
            <img src="{{ asset('images/' . $currentArticle['image']) }}" alt="Main Image" class="article-main-img mb-3">
            
            <div class="article-share mb-5">
                <div class="hashtags mb-2">{{ $currentArticle['hashtags'] }}</div>
                <div class="media-social">
                    <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="https://www.twitter.com/" target="_blank" rel="noopener noreferrer" aria-label="Twitter" class="twitter">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="https://www.whatsapp.com/" target="_blank" rel="noopener noreferrer" aria-label="Whatsapp" class="whatsapp">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                    <a href="https://www.telegram.com/" target="_blank" rel="noopener noreferrer" aria-label="Telegram" class="telegram">
                        <i class="fa-brands fa-telegram"></i>
                    </a>
                </div>
            </div>

            @foreach($reportSections as $section)
            <div class="text-start table-header-title d-flex">
                <div class="me-2">{{ $section['no'] }}</div>
                <div>{{ $section['title'] }}</div>
            </div>

            <div class="table-responsive text-start mb-4">
                <table class="custom-report-table">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 40px;">NO</th>
                            <th class="text-center" style="width: 60%;">NAMA DOKUMEN</th>
                            <th class="text-center" style="width: 100px;">FILE</th>
                            <th class="text-center">KETERANGAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($section['rows'] as $row)
                            <tr>
                                <td class="text-center fw-medium">{{ $row['no'] }}</td>
                                <td>{{ $row['document_name'] }}</td>
                                <td class="text-center">
                                    @if($row['file_link'])
                                        <a href="{{ $row['file_link'] }}" class="text-primary text-decoration-none">Unduh di sini</a>
                                    @endif
                                </td>
                                <td>{{ $row['remarks'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endforeach
            
        </div>
        
        <!-- Sidebar: Terkini & Populer -->
        <div class="col-lg-4 px-lg-4 text-start" style="padding-right: 1.5rem !important; padding-left: 2.5rem !important; width: 380px;">
            <h4 class="lkhpn-report-tagline">Terkini</h4>
            @foreach($latestNewsList as $latest)
                <a href="{{ $latest['link'] }}" class="thumbnail-lhkpn-report">
                    <img src="{{ asset('images/' . $latest['image']) }}" alt="Thumbnail">
                    <div class="thumbnail-overlay">
                        <h4>{{ $latest['title'] }}</h4>
                        <p>{{ $latest['date'] }}</p>
                    </div>
                </a>
            @endforeach

            <h4 class="lkhpn-report-tagline mt-4">Populer</h4>
            @foreach($popularNewsList as $popular)
                <a href="{{ $popular['link'] }}" class="thumbnail-lhkpn-report">
                    <img src="{{ asset('images/' . $popular['image']) }}" alt="Thumbnail">
                    <div class="thumbnail-overlay">
                        <h4>{{ $popular['title'] }}</h4>
                        <p>{{ $popular['date'] }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
