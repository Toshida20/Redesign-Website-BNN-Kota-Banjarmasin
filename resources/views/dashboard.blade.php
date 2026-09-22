@extends('layouts.main')

@section('title', 'Beranda - BNN Kota Banjarmasin')

@section('content')

<div class="pembatas"></div>

<section class="hero-video">
    
    <video autoplay muted loop playsinline class="background-video">
        <source src="{{ asset('videos/bg-dna.mp4') }}" type="video/mp4">
    </video>

    <div class="video-overlay"></div>

    <div class="hero-content">
        <image src="{{ asset('images/logo-bnn.png') }}" alt="Logo BNN" width="190" height="190" class="mb-4">
        <p>Badan Narkotika Nasional Republik Indonesia</p>
        <h1>Kota Banjarmasin</h1>
        <div class="hero-line"></div>
    </div>
</section>

<!-- OUR SERVICE SECTION -->
<div class="our-services">
    <h1>Kami Melayani</h1>
    <div class="service-container">
        <div class="click-service">
            <div class="service-card">
                <div class="service-icon">
                    <image src="{{ asset('images/icon-surat.png') }}"
                         alt="Icon Surat"
                         width="60"
                         height="60">
                </div>
                <h5>
                    Pembuatan Surat Keterangan Hasil Pemeriksaan Narkotika (SKHPN)
                </h5>
            </div>
        </div>
        <div class="click-service">
            <div class="service-card">
                <div class="service-icon">
                    <image src="{{ asset('images/icon-public.png') }}"
                         alt="Icon Public"
                         width="60"
                         height="60">
                </div>
                <h5>
                    Permohonan Sosialisasi P4GN
                </h5>
            </div>
        </div>
        <div class="click-service">
            <div class="service-card">
                <div class="service-icon">
                    <image src="{{ asset('images/icon-pengaduan.png') }}"
                         alt="Icon Pengaduan"
                         width="60"
                         height="60">
                </div>
                <h5>
                    Layanan Pengaduan Masyarakat Mengenai P4GN
                </h5>
            </div>
        </div>
        <div class="click-service">
            <div class="service-card">
                <div class="service-icon">
                    <image src="{{ asset('images/icon-rehabilitas.png') }}"
                         alt="Icon Rehabilitasi"
                         width="60"
                         height="60">
                </div>
                <h5>
                    Informasi Seputar Rehabilitasi
                </h5>
            </div>
        </div>
    </div>
</div>

<!-- KEGIATAN KAMI SECTION -->
<div class="kegiatan-kami" data-kegiatan='[
    {"image":"/images/kegiatan/deteksi-dini-supir.jpeg",
        "title":"Deteksi Dini Soppir Angkutan Dalam Rangka Arus Mudik",
            "description":"Kegiatan Deteksi Dini Sopir Angkutan dalam Rangka Arus Mudik merupakan pemeriksaan kesehatan bagi sopir angkutan umum menjelang masa mudik, meliputi cek tekanan darah, gula darah, dan kondisi fisik lainnya. Kegiatan ini bertujuan memastikan sopir dalam keadaan sehat dan siap mengemudi, guna mencegah kecelakaan akibat kelelahan atau gangguan kesehatan selama perjalanan mudik."},
    {"image":"/images/kegiatan/jumat-bersinar-smpn3.jpg",
        "title":"Jumat Bersinar di SMPN 3 Banjarmasin",
            "description":"Kegiatan edukasi dan sosialisasi bahaya narkoba kepada para siswa SMPN 3 Banjarmasin. Diharapkan dengan kegiatan ini, para pelajar dapat menjauhi narkoba dan fokus pada pendidikan mereka untuk masa depan yang lebih baik."},
    {"image":"/images/kegiatan/rapat.jpeg",
        "title":"Rapat Koordinasi BNN Kota Banjarmasin",
            "description":"Rapat koordinasi rutin yang diselenggarakan oleh BNN Kota Banjarmasin guna membahas strategi dan evaluasi program Pencegahan dan Pemberantasan Penyalahgunaan dan Peredaran Gelap Narkotika (P4GN) di wilayah Kota Banjarmasin."},
    {"image":"/images/kegiatan/jumat-bersinar-smpn3-foto2.jpeg",
        "title":"Pelayanan Terpadu Keliling",
            "description":"Pelayanan Terpadu Keliling Mobil Bungas BNN Kota Banjarmasin dalam rangka memberikan layanan informasi dan konsultasi kepada masyarakat luas secara langsung dan mudah dijangkau."}]'>
    
    <div id="kegiatan-bg" class="kegiatan-bg"></div>
    <div class="kegiatan-overlay"></div>
    
    <div class="kegiatan-wrapper">
        <div class="kegiatan-row">
            
            <div class="kegiatan-col-left">
                <button id="slider-up" class="slider-btn slider-btn-up">
                    <img src="{{ asset('images/arrow.png') }}" alt="Arrow Up">
                </button>
                
                <div id="activity-slider-images" class="slider-images-container"></div>

                <button id="slider-down" class="slider-btn slider-btn-down">
                    <img src="{{ asset('images/arrow.png') }}" alt="Arrow Down">
                </button>
            </div>
            
            <div class="kegiatan-col-right">
                <h1 class="kegiatan-title">Kegiatan Kami</h1>
                
                <div class="kegiatan-text-wrapper">
                    <h4 id="activity-title" class="transition-text kegiatan-subtitle"></h4>
                    <p id="activity-desc" class="transition-text kegiatan-desc"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DIVISI CARD SECTION -->
<section class="division-grid">

    <div class="division-card">
        <img src="{{ asset('images/bg-sekretariat.jpg') }}" alt="BNNP & BNNK">
        <div class="overlay"></div>

        <div class="division-content">
            <h3>BNNP & BNNK</h3>
            <a href="#" class="btn-kunjungi">Kunjungi</a>
        </div>
    </div>

    <div class="division-card">
        <img src="{{ asset('images/bg-cegah.jpg') }}" alt="Bidang Pencegahan">
        <div class="overlay"></div>

        <div class="division-content">
            <h3>Bidang Pencegahan dan<br>Pemberdayaan Masyarakat</h3>
            <a href="#" class="btn-kunjungi">Kunjungi</a>
        </div>
    </div>

    <div class="division-card">
        <img src="{{ asset('images/bg-rehabilitasi.jpg') }}" alt="BNNP & BNNK">
        <div class="overlay"></div>

        <div class="division-content">
            <h3>Bidang Rehabilitas</h3>
            <a href="#" class="btn-kunjungi">Kunjungi</a>
        </div>
    </div>

    <div class="division-card">
        <img src="{{ asset('images/bg-pemberantasan.jpg') }}" alt="Bidang Pemberantasan">
        <div class="overlay"></div>

        <div class="division-content">
            <h3>Bidang Pemberantasan</h3>
            <a href="#" class="btn-kunjungi">Kunjungi</a>
        </div>
    </div>

    <div class="division-card">
        <img src="{{ asset('images/bg-loker.jpg') }}" alt="Lowongan Kerja">
        <div class="overlay"></div>

        <div class="division-content">
            <h3>Lowongan Kerja</h3>
            <a href="#" class="btn-kunjungi">Kunjungi</a>
        </div>
    </div>

    <div class="division-card">
        <img src="{{ asset('images/bg-edukasi.jpg') }}" alt="Edukasi">
        <div class="overlay"></div>

        <div class="division-content">
            <h3>Edukasi</h3>
            <a href="#" class="btn-kunjungi">Kunjungi</a>
        </div>
    </div>

</section>

<!-- NEWS HIGHLIGHT SECTION -->
<section class="news-highlight">
    <div id="news-bg-layer-old" class="news-highlight-bg" style="background-image: url('{{ asset('images/berita/Berita-1.jpeg') }}');"></div>
    <div id="news-bg-layer" class="news-highlight-bg" style="background-image: url('{{ asset('images/berita/Berita-1.jpeg') }}'); transition: opacity 0.5s ease-in-out;"></div>
    <div class="news-highlight-overlay"></div>

    <div class="news-highlight-wrapper">
        <div class="news-main-content">
            <p class="news-author">Oleh Humas BNN Kota Banjarmasin</p>
            <h1 id="news-main-title" class="news-title" style="transition: opacity 0.3s, transform 0.3s; transform: translateY(0);">RENCANA KERJA BNN KOTA BANJARMASIN<br>TAHUN 2026</h1>
            <a href="#" class="btn-baca-selengkapnya">Baca Selengkapnya</a>
        </div>

        <div class="news-bottom-row">
            <div class="news-bottom-item active" data-bg="{{ asset('images/berita/Berita-1.jpeg') }}" data-title="RENCANA KERJA BNN KOTA BANJARMASIN<br>TAHUN 2026">
                <p>RENCANA KERJA BNN KOTA BANJARMASIN<br>TAHUN 2026</p>
                <div class="news-line"></div>
            </div>
            <div class="news-bottom-item" data-bg="{{ asset('images/berita/Berita-2.jpeg') }}" data-title="LAPORAN KINERJA INSTANSI<br>PEMERINTAH (LKIP) BNN KOTA<br>BANJARMASIN TAHUN 2025">
                <p>LAPORAN KINERJA INSTANSI<br>PEMERINTAH (LKIP) BNN KOTA<br>BANJARMASIN TAHUN 2025</p>
                <div class="news-line"></div>
            </div>
            <div class="news-bottom-item" data-bg="{{ asset('images/berita/Berita-3.jpeg') }}" data-title="RENPROJA BNN KOTA<br>BANJARMASIN 2025 – 2029">
                <p>RENPROJA BNN KOTA<br>BANJARMASIN 2025 - 2029</p>
                <div class="news-line"></div>
            </div>
            <div class="news-bottom-item" data-bg="{{ asset('images/berita/Berita-4.jpeg') }}" data-title="BERITA KEGIATAN BNN KOTA<br>BANJARMASIN TERBARU">
                <p>BERITA KEGIATAN BNN KOTA<br>BANJARMASIN TERBARU</p>
                <div class="news-line"></div>
            </div>
        </div>
    </div>
</section>

<section class="news-page">
    <div id="news-page-bg" class="news-page-bg" style="background-image: url('{{ asset('images/bg-newspaper-1300x700.jpg') }}');"></div>
    <div class="news-page-overlay"></div>
    <div class="news-page-container">

        <!-- ARTIKEL SECTION -->
        <div class="news-section">
            <div class="news-section-header">
                <h2>Artikel</h2>
                <p>Artikel Badan Narkotika Nasional</p>
            </div>
            
            <div class="news-grid">
                <div class="news-card">
                    <a href="#" class="post-link">
                    <div class="news-card-img">
                        <img src="{{ asset('images/artikel/artikel-1.jpg') }}" alt="Artikel">
                    </div>
                    <div class="news-card-content">
                        <span class="news-category">Artikel</span>
                        <h3 class="news-title">KEPALA BNN RI BERIKAN KULIAH UMUM DAN TEKEN MOU DI PKKMB UNIVERSITAS PANCASILA</h3>
                    </div>
                    </a>
                </div>
                <div class="news-card">
                    <a href="#" class="post-link">
                    <div class="news-card-img">
                        <img src="{{ asset('images/artikel/artikel-2.jpg') }}" alt="Artikel">
                    </div>
                    <div class="news-card-content">
                        <span class="news-category">Artikel</span>
                        <h3 class="news-title">KEPALA BNN RI BERIKAN KULIAH UMUM DAN TEKEN MOU DI PKKMB UNIVERSITAS PANCASILA</h3>
                    </div>
                    </a>
                </div>
                <div class="news-card">
                    <a href="#" class="post-link">
                    <div class="news-card-img">
                        <img src="{{ asset('images/artikel/artikel-3.jpg') }}" alt="Artikel">
                    </div>
                    <div class="news-card-content">
                        <span class="news-category">Artikel</span>
                        <h3 class="news-title">KEPALA BNN RI BERIKAN KULIAH UMUM DAN TEKEN MOU DI PKKMB UNIVERSITAS PANCASILA</h3>
                    </div>
                    </a>
                </div>
            </div>
            
            <!-- SMALL NEWS LIST (ARTIKEL) -->
            <div class="news-small-grid">
                <div class="news-small-item">
                    <a href="#" class="news-small-link">
                        <div class="news-small-img">
                            <img src="{{ asset('images/artikel/artikel-1.jpg') }}" alt="News">
                        </div>
                        <div class="news-small-content">
                            <span class="news-small-category">Berita Utama</span>
                            <h4 class="news-small-title">GENERASI MUDA JAWA BARAT LAWAN NARKOBA MELALUI PASANGGIRI AGUNG KAWIH SINOM</h4>
                        </div>
                    </a>
                </div>
                <div class="news-small-item">
                    <a href="#" class="news-small-link">
                        <div class="news-small-img">
                            <img src="{{ asset('images/artikel/artikel-2.jpg') }}" alt="News">
                        </div>
                        <div class="news-small-content">
                            <span class="news-small-category">Unggulan</span>
                            <h4 class="news-small-title">BNN DAN TNI AD PERKUAT SINERGI DALAM UPAYA P4GN</h4>
                        </div>
                    </a>
                </div>
                <div class="news-small-item">
                    <a href="#" class="news-small-link">
                        <div class="news-small-img">
                            <img src="{{ asset('images/artikel/artikel-3.jpg') }}" alt="News">
                        </div>
                        <div class="news-small-content">
                            <span class="news-small-category">Unggulan</span>
                            <h4 class="news-small-title">KEPALA BNN RI AUDIENSI DENGAN KASAU, PERKUAT KOLABORASI P4GN</h4>
                        </div>
                    </a>
                </div>
                <div class="news-small-item">
                    <a href="#" class="news-small-link">
                        <div class="news-small-img">
                            <img src="{{ asset('images/artikel/artikel-1.jpg') }}" alt="News">
                        </div>
                        <div class="news-small-content">
                            <span class="news-small-category">Unggulan</span>
                            <h4 class="news-small-title">KEPALA BNN RI HADIRI PELEPASAN KONTINGEN INDONESIA CYCLING MENUJU ASIAN GAMES 2026</h4>
                        </div>
                    </a>
                </div>
                <div class="news-small-item">
                    <a href="#" class="news-small-link">
                        <div class="news-small-img">
                            <img src="{{ asset('images/artikel/artikel-2.jpg') }}" alt="News">
                        </div>
                        <div class="news-small-content">
                            <span class="news-small-category">Unggulan</span>
                            <h4 class="news-small-title">AUDIENSI BNN DAN ADKASI: KEPALA BNN RI AJAK DPRD KABUPATEN SE-INDONESIA BERSATU PERANGI NARKOTIKA</h4>
                        </div>
                    </a>
                </div>
                <div class="news-small-item">
                    <a href="#" class="news-small-link">
                        <div class="news-small-img">
                            <img src="{{ asset('images/artikel/artikel-3.jpg') }}" alt="News">
                        </div>
                        <div class="news-small-content">
                            <span class="news-small-category">Berita Utama</span>
                            <h4 class="news-small-title">BNN TERIMA KUNJUNGAN SMPIT INSAN MANDIRI JAGAKARSA, EDUKASI PELAJAR TENTANG BAHAYA NARKOTIKA</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- BERITA KEGIATAN SECTION -->
        <div class="news-section">
            <div class="news-section-header">
                <h2>Berita Kegiatan</h2>
                <p>Berita Kegiatan Badan Narkotika Nasional</p>
            </div>
            
            <div class="news-grid">
                <div class="news-card">
                    <a href="#" class="post-link">
                    <div class="news-card-img">
                        <img src="{{ asset('images/berita/Berita-1.jpeg') }}" alt="Berita Kegiatan">
                    </div>
                    <div class="news-card-content">
                        <span class="news-category">Berita Kegiatan</span>
                        <h3 class="news-title">KEPALA BNN RI BERIKAN KULIAH UMUM DAN TEKEN MOU DI PKKMB UNIVERSITAS PANCASILA</h3>
                    </div>
                    </a>
                </div>
                <div class="news-card">
                    <a href="#" class="post-link">
                    <div class="news-card-img">
                        <img src="{{ asset('images/berita/Berita-2.jpeg') }}" alt="Berita Kegiatan">
                    </div>
                    <div class="news-card-content">
                        <span class="news-category">Berita Kegiatan</span>
                        <h3 class="news-title">KEPALA BNN RI BERIKAN KULIAH UMUM DAN TEKEN MOU DI PKKMB UNIVERSITAS PANCASILA</h3>
                    </div>
                    </a>
                </div>
                <div class="news-card">
                    <a href="#" class="post-link">
                    <div class="news-card-img">
                        <img src="{{ asset('images/berita/Berita-3.jpeg') }}" alt="Berita Kegiatan">
                    </div>
                    <div class="news-card-content">
                        <span class="news-category">Berita Kegiatan</span>
                        <h3 class="news-title">KEPALA BNN RI BERIKAN KULIAH UMUM DAN TEKEN MOU DI PKKMB UNIVERSITAS PANCASILA</h3>
                    </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- SMALL NEWS LIST -->
        <div class="news-small-grid">
            <div class="news-small-item">
                <a href="#" class="news-small-link">
                    <div class="news-small-img">
                        <img src="{{ asset('images/berita/Berita-1.jpeg') }}" alt="News">
                    </div>
                    <div class="news-small-content">
                        <span class="news-small-category">Berita Utama</span>
                        <h4 class="news-small-title">GENERASI MUDA JAWA BARAT LAWAN NARKOBA MELALUI PASANGGIRI AGUNG KAWIH SINOM</h4>
                    </div>
                </a>
            </div>
            <div class="news-small-item">
                <a href="#" class="news-small-link">
                    <div class="news-small-img">
                        <img src="{{ asset('images/berita/Berita-2.jpeg') }}" alt="News">
                    </div>
                    <div class="news-small-content">
                        <span class="news-small-category">Unggulan</span>
                        <h4 class="news-small-title">BNN DAN TNI AD PERKUAT SINERGI DALAM UPAYA P4GN</h4>
                    </div>
                </a>
            </div>
            <div class="news-small-item">
                <a href="#" class="news-small-link">
                    <div class="news-small-img">
                        <img src="{{ asset('images/berita/Berita-3.jpeg') }}" alt="News">
                    </div>
                    <div class="news-small-content">
                        <span class="news-small-category">Unggulan</span>
                        <h4 class="news-small-title">KEPALA BNN RI AUDIENSI DENGAN KASAU, PERKUAT KOLABORASI P4GN</h4>
                    </div>
                </a>
            </div>
            <div class="news-small-item">
                <a href="#" class="news-small-link">
                    <div class="news-small-img">
                        <img src="{{ asset('images/berita/Berita-4.jpeg') }}" alt="News">
                    </div>
                    <div class="news-small-content">
                        <span class="news-small-category">Unggulan</span>
                        <h4 class="news-small-title">KEPALA BNN RI HADIRI PELEPASAN KONTINGEN INDONESIA CYCLING MENUJU ASIAN GAMES 2026</h4>
                    </div>
                </a>
            </div>
            <div class="news-small-item">
                <a href="#" class="news-small-link">
                    <div class="news-small-img">
                        <img src="{{ asset('images/berita/Berita-1.jpeg') }}" alt="News">
                    </div>
                    <div class="news-small-content">
                        <span class="news-small-category">Unggulan</span>
                        <h4 class="news-small-title">AUDIENSI BNN DAN ADKASI: KEPALA BNN RI AJAK DPRD KABUPATEN SE-INDONESIA BERSATU PERANGI NARKOTIKA</h4>
                    </div>
                </a>
            </div>
            <div class="news-small-item">
                <a href="#" class="news-small-link">
                    <div class="news-small-img">
                        <img src="{{ asset('images/berita/Berita-2.jpeg') }}" alt="News">
                    </div>
                    <div class="news-small-content">
                        <span class="news-small-category">Berita Utama</span>
                        <h4 class="news-small-title">BNN TERIMA KUNJUNGAN SMPIT INSAN MANDIRI JAGAKARSA, EDUKASI PELAJAR TENTANG BAHAYA NARKOTIKA</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
