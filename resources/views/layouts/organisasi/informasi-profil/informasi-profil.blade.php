@extends('layouts.master')

@section('title', 'Tugas dan Fungsi BNN Kota Banjarmasin')

@section('content')

<div class="container mt-5 mb-5" style="padding-top: 75px;">
    
    @include('layouts.main.navigation-bar.main-media-social')
    
    <div class="profil-wrapper">

        <nav class="profil-sidebar" aria-label="Navigasi informasi profil">

            <button type="button"
                class="btn-menu active"
                data-target="sejarah"
                aria-controls="sejarah"
                aria-selected="true">
                <i class="fa-regular fa-file-lines"></i>
                <span>Sejarah</span>
            </button>

            <button type="button"
                class="btn-menu"
                data-target="visi-misi"
                aria-controls="visi-misi"
                aria-selected="false">
                <i class="fa-regular fa-lightbulb"></i>
                <span>Visi dan Misi</span>
            </button>

            <button type="button"
                class="btn-menu"
                data-target="tugas-fungsi"
                aria-controls="tugas-fungsi"
                aria-selected="false">
                <i class="fa-solid fa-gear"></i>
                <span>Tugas dan Fungsi</span>
            </button>

        </nav>

        <main class="profil-content">

            <section id="sejarah"
                class="profil-panel active"
                aria-hidden="false">
                <div class="content-sejarah mt-4">
                    <p>Badan Narkotika Nasional merupakan lembaga vertikal yang memiliki perwakilan di daerah yang disebut Badan Narkotika Nasional Kota. BNN Kota Banjarmasin merupakan perwakilan BNN yang berlokasi di Jl. Pangeran Hidayatullah Kelurahan Banua Anyar Kecamatan Banjarmasin Utara Kota Banjarmasin Kalimantan Selatan.</p>

                    <p>Berdasarkan Peraturan Daerah Kota Banjarmasin Nomor 28 Tahun 2008 tentang organisasi dan tata kerja pelaksana harian Badan Narkotika Kota (BNK) Banjarmasin, pelaksana harian Kota Banjarmasin merupakan lembaga lain sebagai bagian dari perangkat daerah yang pembentukannya ditetapkan dengan Perda. Pelaksana harian BNK tersebut merupakan unsur penunjang yang berkedudukan dibawah dan bertanggungjawab kepada ketua BNK Banjarmasin (wakil walikota Banjarmasin) dan mempunyai tugas pokok memberikan dukungan teknis, administratif, dan operasional yang menangani masalah P4GN, psikotropika, dan bahan adiktif lainnya.</p>

                    <p>Sejalan dengan hal tersebut di atas, organisasi pelaksana harian BNK Banjarmasin terdiri dari:</p>

                    <ol>
                        <li>Kepala Pelaksana Harian BNK Banjarmasin</li>
                        <li>Sekretaris Pelaksana Harian BNK Banjarmasin</li>
                        <li>Seksi Pencegahan</li>
                        <li>Seksi Penegakan Hukum</li>
                        <li>Seksi Terapi dan Rehabilitasi</li>
                        <li>Seksi Data dan Informasi</li>
                    </ol>

                    <p>Sejalan dengan hal tersebut, maka pada tahun 2011 Perda Kota Banjarmasin tentang Struktur Organisasi Tata Kelola (SOTK) BNK Banjarmasin dinyatakan tidak berlaku lagi sesuai dengan Peraturan Daerah Kota Banjarmasin Nomor 26 Tahun 2011 tentang pencabutan Peraturan Daerah Nomor 28 Tahun 2008 tentang SOTK BNK Banjarmasin. Hal itu disebabkan karena berlakunya Undang-Undang Nomor 35 Tahun 2009 tentang Narkotika sebagai pengganti Undang-Undang Nomor 22 Tahun 1997 dan Peraturan Presiden Nomor 23 Tahun 2010 tentang Badan Narkotika Nasional (BNN), serta Peraturan Presiden Nomor 83 Tahun 2007 tentang BNN, BNNP, BNNKab/Kota, maka itulah yang menjadi dasar lahirnya Badan Narkotika Nasional Kota Banjarmasin, dan didukung oleh Peraturan Presiden Nomor 23 Tahun 2010 tentang BNN serta Peraturan Kepala BNN RI No. 4 pada Tahun 2010 tentang SOTK BNNP dan BNNKab/Kota secara langsung menjadi instansi vertikal. Berdasarkan hal tersebut, maka BNN Kota Banjarmasin resmi dibentuk pada bulan November 2011 sampai dengan sekarang.</p>

                    <p>Badan Narkotika Nasional Kota Banjarmasin sebagai instansi vertikal Badan Narkotika Nasional di daerah Kota Banjarmasin, BNN Kota Banjarmasin mempunyai tugas dan fungsi melaksanakan Pencegahan dan Pemberantasan Penyalahgunaan dan Peredaran Gelap Narkotika (P4GN) di Kota Banjarmasin. Badan Narkotika Nasional Kota Banjarmasin melakukan koordinasi dengan pihak terkait yang berada dilingkungan Kota Banjarmasin baik dilingkungan pemerintah maupun swasta untuk menyatukan visi dan misi dalam memerangi pengedaran gelap narkotika di Kota Banjarmasin.</p>
                </div>
            </section>

            <section id="visi-misi"
                class="profil-panel"
                aria-hidden="true"
                hidden>
                <div class="content-sejarah mt-4 text-center">
                    <h3 class="fw-bold mb-4" style="color: #444;">Visi</h3>
                    <p style="text-align: justify; margin-bottom: 30px;">
                        Menjadi perwakilan BNN RI di Kota Banjarmasin yang Profesional dan Mampu Menyatukan dan Menggerakkan Seluruh Komponen Masyarakat di Wilayah Kota Banjarmasin dalam Melaksanakan Pencegahan, Pemberantasan, Penyalahgunaan dan Peredaran Gelap Narkoba (P4GN).
                    </p>

                    <h3 class="fw-bold mb-4" style="color: #444;">Misi</h3>
                    <p style="text-align: left;">
                        Sejalan dengan hal tersebut di atas, organisasi pelaksana harian BNK Banjarmasin terdiri dari:
                    </p>

                    <ol style="text-align: left; padding-left: 20px;">
                        <li>Pencegahan</li>
                        <li>Pemberdayaan Masyarakat</li>
                        <li>Rehabilitasi (Penjangkauan dan Pendampingan)</li>
                        <li>Pemberantasan</li>
                        <li>Tata Kelola Pemerintahan yang Akuntabel</li>
                    </ol>
                </div>
            </section>

            <section id="tugas-fungsi"
                class="profil-panel"
                aria-hidden="true"
                hidden>
                <div class="content-sejarah mt-4 text-center">
                    <h2 class="fw-bold mb-4" style="color: #444;">Tugas Pokok dan Fungsi BNN Kota Banjarmasin</h2>
                    <h3 class="fw-bold mb-4" style="color: #444;">Kedudukan</h3>
                    <p style="text-align: justify; margin-bottom: 30px;">
                        Tugas dan Fungsi BNN Kota Banjarmasin, BNN merupakan sebuah lembaga Pemerintah Non Kementrian (LPKN) Indonesia yang melaksanakan tugas pemerintahan di bidang pencegahan, pemberantasan, Penyalahgunaan dan Peredaran gelap Psikotropika,Prekusor, dan bahan adiktif lainnya.
                    </p>

                    <h3 class="fw-bold mb-4" style="color: #444;">Tugas</h3>
                    <p style="text-align: left;">
                        Adapun tugas dari BNN Kota Banjarmasin adalah sebagai berikut:
                    </p>

                    <ol style="text-align: left; padding-left: 20px;">
                        <li>Mencegah dan memberantas penyalahgunaan dan peredaran gelap narkotika dan prekusor narkotika.</li>
                        <li>Berkoordinasi dengan Kepala Kepolisian daerah dalam pencegahan dan pemberantasan penyalahgunaan dan peredaran gelap narkotika dan prekusor narkotika.</li>
                        <li>Meningkatkan kemampuan lembaga rehabiltasi medis dan rehabilitasi sosial pecandu narkotika baik yang diselenggarakan oleh pemerintah maupun masyarakat.</li>
                        <li>Memberdayakan masyarakat dalam pencegahan penyalahgunaan dan peredaan gelap narkotika dan prekusor narkotika.</li>
                        <li>Memantau, mengarahkan dan meningkatkankegiatan masyarakat dalam pencegahan penyalahgunaan dan peredaran gelap narkotika dan psikotropika narkotika.</li>
                        <li>Melaksanakan administrasi penyelidikan dan penyidikan terhadap perkara penyalahgunaan dan peredaran gelap narkotika dan prekusor narkotika</li>
                        <li>Membuat laporan tahunan mengenai pelaksanaan tugas dan wewenang.</li>
                    </ol>

                    <h3 class="fw-bold mb-4" style="color: #444;">Fungsi</h3>
                    <p style="text-align: left;">
                        Selain mempunyai tugas, BNN Kota Banjarmasin juga mempunyai fungsi antara lain:
                    </p>

                    <ol style="text-align: left; padding-left: 20px;">
                        <li>Penyusunan dan perumusan kebijakan nasional di bidang pencegahan dan pemberantasan penyalahgunaan dan peredaran gelap narkotika, psikotropika dan prekursor serta bahan adiktif lainnya kecuali bahan adiktif untuk tembakau dan alkohol yang selanjutnya disingkat dengan P4GN.</li>
                        <li>Penyusunan perencanaan, program dan anggaran BNN Kota Banjarmasin.</li>
                        <li>Penyusunan dan perumusan kebijakan teknis pencegahan, pemberdayaan masyarakat, pemberantasan, rehabilitasi, hukum dan kerjasama di bidang P4GN.</li>
                        <li>Pelaksanaan kebijakan nasional dan kebijakan teknis P4GN di bidang pencegahan, pemberdayaan masyarakat, pemberantasan dan rehabilitasi, hukum dan kerjasama.</li>
                        <li>Pelaksanaan pembinaan teknis di bidang P4GN kepada instansi terkait di lingkungan BNN Kota Banjarmasin.</li>
                        <li>Pengoordinasian instansi pemerintah terkait dan komponen masyarakat dalam rangka penyusunan dan perumusan serta pelaksanaan kebijakan nasional di bidang P4GN.</li>
                        <li>Penyelenggaraan pembinaan dan pelayanan administrasi di lingkungan BNN Kota Banjarmasin.</li>
                        <li>Pelaksanaan fasilitasi dan pengkoordinasian wadah peran serta masyarakat.</li>
                        <li>Pelaksanaan penyelidikan dan penyidikan penyalahgunaan dan peredaran gelap Narkotika dan Prekursor Narkotika.</li>
                        <li>Pengkoordinasian peningkatan kemampuan lembaga rehabilitasi medis dan rehabilitasi sosial pecandu narkotika dan psikotropika serta bahan adiktif lainnya, kecuali bahan adiktif untuk tembakau dan alkohol yang diselenggarakan oleh pemerintah dan masyarakat.</li>
                        <li>Pelaksanaan penegakan disiplin, kode etik pegawai BNN Kota Banjarmasin dan kode etik profesi penyidik BNN Kota Banjarmasin.</li>
                        <li>Pelaksanaan evaluasi dan pelaporan pelaksanaan kebijakan nasional di bidang P4GN.</li>
                    </ol>
                </div>
            </section>
        </main>
    </div>
</div>