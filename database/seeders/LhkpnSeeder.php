<?php

namespace Database\Seeders;

use App\Models\LhkpnCategory;
use App\Models\LhkpnDocument;
use App\Models\LhkpnFile;
use App\Models\LhkpnPejabat;
use App\Models\LhkpnReport;
use App\Models\LhkpnTable;
use App\Models\User;
use Illuminate\Database\Seeder;

class LhkpnSeeder extends Seeder
{
    /**
     * Run the database seeds for LHKPN (Tabel Laporan Custom & LHKPN Pejabat).
     */
    public function run(): void
    {
        $admin = User::where('email', 'admin@bnnk.go.id')->first() ?? User::first();

        // 1. Kategori LHKPN
        $catPejabat = LhkpnCategory::firstOrCreate(['name' => 'LHKPN Pejabat', 'slug' => 'lhkpn-pejabat']);
        $catPengadaan = LhkpnCategory::firstOrCreate(['name' => 'Pengadaan Barang dan Jasa', 'slug' => 'pengadaan-barang-dan-jasa']);
        $catPemilihan = LhkpnCategory::firstOrCreate(['name' => 'Tahap Pemilihan', 'slug' => 'tahap-pemilihan']);

        // =========================================================================
        // A. LHKPN PEJABAT BNN RI (Tabel Pejabat & Link PDF Tahunan)
        // =========================================================================
        $lhkpnPejabatReport = LhkpnReport::updateOrCreate(
            ['slug' => 'laporan-harta-kekayaan-pejabat-negara-lhkpn'],
            [
                'user_id' => $admin ? $admin->id : 1,
                'title' => 'Laporan Harta Kekayaan Pejabat Negara di Lingkungan BNN RI',
                'periode' => 'Tersedia Berkala',
                'thumbnail' => 'images/assets/public/logo/logo-bnn.png',
                'published_at' => '2026-08-18 10:30:00',
                'views_count' => 450,
                'status' => 'published',
            ]
        );
        $lhkpnPejabatReport->categories()->sync([$catPejabat->id]);

        $pejabatList = [
            'Kepala Badan Narkotika Nasional Republik Indonesia' => ['LHKPN Tahun 2025', 'LHKPN Tahun 2022'],
            'Sekretaris Utama Badan Narkotika Nasional Republik Indonesia' => ['LHKPN Tahun 2025', 'LHKPN Tahun 2024'],
            'Inspektur Utama Badan Narkotika Nasional Republik Indonesia' => ['LHKPN Tahun 2025', 'LHKPN Tahun 2024'],
            'Deputi Pencegahan' => ['LHKPN Tahun 2025', 'LHKPN Tahun 2024'],
            'Deputi Pemberdayaan Masyarakat' => ['LHKPN Tahun 2025'],
            'Deputi Pemberantasan' => ['LHKPN Tahun 2025'],
        ];

        $pejabatNumber = 1;
        foreach ($pejabatList as $namaJabatan => $years) {
            $pejabat = LhkpnPejabat::updateOrCreate(
                [
                    'lhkpn_report_id' => $lhkpnPejabatReport->id,
                    'nama_jabatan' => $namaJabatan,
                ],
                [
                    'pejabat_number' => $pejabatNumber,
                    'sort_order' => $pejabatNumber,
                ]
            );

            $fileOrder = 1;
            foreach ($years as $judul) {
                preg_match('/\d{4}/', $judul, $matches);
                $tahun = $matches[0] ?? '2025';

                LhkpnFile::updateOrCreate(
                    [
                        'lhkpn_pejabat_id' => $pejabat->id,
                        'tahun' => $tahun,
                    ],
                    [
                        'judul_laporan' => $judul,
                        'file_pdf' => 'pdf/lhkpn/lhkpn-' . $tahun . '.pdf',
                        'sort_order' => $fileOrder++,
                    ]
                );
            }
            $pejabatNumber++;
        }

        $reportPengadaan = LhkpnReport::updateOrCreate(
            ['slug' => 'jumlah-jenis-dan-gambaran-umum-pelanggaran-yang-dilaporkan'],
            [
                'user_id' => $admin ? $admin->id : 1,
                'title' => 'Jumlah, Jenis, Dan Gambaran Umum Pelanggaran Yang Dilaporkan Oleh Masyarakat Serta Laporan Penindakannya',
                'thumbnail' => 'images/assets/public/logo/logo-bnn.png',
                'published_at' => '2026-08-21 09:00:00',
                'views_count' => 125,
                'status' => 'published',
            ]
        );
        $reportPengadaan->categories()->sync([$catPengadaan->id, $catPemilihan->id]);

        // Tabel 1
        $table1 = LhkpnTable::updateOrCreate(
            [
                'lhkpn_report_id' => $reportPengadaan->id,
                'table_number' => 1,
            ],
            [
                'title' => '1. PENGADAAN REAGEN DAN BAHAN/ BARANG CONSUMABLE PEMERIKSAAN UJI NARKOTIKA, PSIKOTROPIKA, PREKURSOR DAN BAHAN ADIKTIF LAINNYA.',
                'sort_order' => 1,
            ]
        );

        $docsTable1 = [
            [
                'nama' => 'Dokumen Kontrak yang telah ditandatangani beserta Perubahan Kontrak yang tidak mengandung informasi yang dikecualikan',
                'file' => 'pdf/lhkpn/dummy-dokumen-kontrak.pdf',
                'keterangan' => null,
            ],
            [
                'nama' => 'Ringkasan Kontrak yang sekurang-kurangnya mencantumkan informasi mengenai para pihak yang bertandatangan, nomor pokok wajib pajak, nilai kontrak, dll',
                'file' => 'pdf/lhkpn/dummy-ringkasan-kontrak.pdf',
                'keterangan' => null,
            ],
            [
                'nama' => 'Surat Perintah Mulai Kerja',
                'file' => 'pdf/lhkpn/dummy-spmk.pdf',
                'keterangan' => null,
            ],
            [
                'nama' => 'Surat Perintah Mulai Kerja',
                'file' => null,
                'keterangan' => 'Masih Dalam Proses',
            ],
            [
                'nama' => 'Surat Perintah Mulai Kerja',
                'file' => null,
                'keterangan' => 'Tidak dipersyaratkan',
            ],
        ];

        foreach ($docsTable1 as $idx => $doc) {
            LhkpnDocument::updateOrCreate(
                [
                    'lhkpn_table_id' => $table1->id,
                    'sort_order' => $idx + 1,
                ],
                [
                    'nama_dokumen' => $doc['nama'],
                    'file_pdf' => $doc['file'],
                    'keterangan' => $doc['keterangan'],
                ]
            );
        }

        // Tabel 2
        $table2 = LhkpnTable::updateOrCreate(
            [
                'lhkpn_report_id' => $reportPengadaan->id,
                'table_number' => 2,
            ],
            [
                'title' => '2. PENGADAAN PAKAN DAN OBAT-OBATAN K-9',
                'sort_order' => 2,
            ]
        );

        LhkpnDocument::updateOrCreate(
            [
                'lhkpn_table_id' => $table2->id,
                'sort_order' => 1,
            ],
            [
                'nama_dokumen' => 'Dokumen Kontrak Pengadaan Pakan dan Obat-obatan K-9',
                'file_pdf' => 'pdf/lhkpn/dummy-kontrak-k9.pdf',
                'keterangan' => null,
            ]
        );
    }
}
