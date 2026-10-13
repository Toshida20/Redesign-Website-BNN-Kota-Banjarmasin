<?php

namespace Database\Seeders;

use App\Models\PpidCategory;
use App\Models\PpidDocument;
use App\Models\User;
use Illuminate\Database\Seeder;

class PpidSeeder extends Seeder
{

    public function run(): void
    {
        $admin = User::where('email', 'admin@bnnk.go.id')->first() ?? User::first();

        // 12 Jenis Menu PPID sesuai nama folder di public/pdf/ppid
        $ppidMenus = [
            [
                'name' => 'Bahan Ajar',
                'slug' => 'bahan-ajar',
                'icon' => 'bi bi-journal-bookmark',
            ],
            [
                'name' => 'Indikator Kinerja Kegiatan (IKK)',
                'slug' => 'ikk',
                'icon' => 'bi bi-bar-chart-steps',
            ],
            [
                'name' => 'Indikator Kinerja Utama (IKU)',
                'slug' => 'iku',
                'icon' => 'bi bi-graph-up-arrow',
            ],
            [
                'name' => 'Indonesian Drug Report',
                'slug' => 'indonesian-drug-report',
                'icon' => 'bi bi-file-earmark-medical',
            ],
            [
                'name' => 'Infografis Triwulan',
                'slug' => 'infografis-triwulan',
                'icon' => 'bi bi-pie-chart',
            ],
            [
                'name' => 'Laporan Keuangan',
                'slug' => 'laporan-keuangan',
                'icon' => 'bi bi-cash-coin',
            ],
            [
                'name' => 'Laporan Kinerja',
                'slug' => 'laporan-kinerja',
                'icon' => 'bi bi-clipboard-data',
            ],
            [
                'name' => 'Peraturan',
                'slug' => 'peraturan',
                'icon' => 'bi bi-bank',
            ],
            [
                'name' => 'Perjanjian Kinerja',
                'slug' => 'perjanjian-kinerja',
                'icon' => 'bi bi-file-earmark-check',
            ],
            [
                'name' => 'Rencana Aksi',
                'slug' => 'rencana-aksi',
                'icon' => 'bi bi-calendar-check',
            ],
            [
                'name' => 'Rencana Strategi',
                'slug' => 'rencana-strategi',
                'icon' => 'bi bi-diagram-3',
            ],
            [
                'name' => 'Renja / RKT',
                'slug' => 'renja-rkt',
                'icon' => 'bi bi-newspaper',
            ],
        ];

        $order = 1;
        foreach ($ppidMenus as $menu) {
            $cat = PpidCategory::updateOrCreate(
                ['slug' => $menu['slug']],
                [
                    'name' => $menu['name'],
                    'icon' => $menu['icon'],
                    'sort_order' => $order++,
                ]
            );

            if ($menu['slug'] === 'renja-rkt') {
                $sampleRkts = [
                    'RKT Badan Narkotika Nasional',
                    'RKT Sekretariat Utama BNN',
                    'RKT Inspektorat Utama BNN',
                    'RKT Deputi Bidang Pencegahan BNN',
                    'RKT Deputi Bidang Pemberdayaan Masyarakat BNN',
                    'RKT Deputi Bidang Rehabilitasi BNN',
                    'RKT Deputi Bidang Hukum dan Kerjasama BNN',
                    'RKT Pusat Pengembangan Sumber Daya Manusia BNN',
                    'RKT Pusat Penelitian, Data, dan Informasi BNN',
                    'RKT Pusat Laboratorium Narkotika BNN',
                    'RKT Balai Besar Rehabilitasi Lido BNN',
                ];

                $docOrder = 1;
                foreach ($sampleRkts as $judulRkt) {
                    PpidDocument::updateOrCreate(
                        [
                            'ppid_category_id' => $cat->id,
                            'nama_dokumen' => $judulRkt,
                            'tahun' => 'Tahun 2021',
                        ],
                        [
                            'user_id' => $admin ? $admin->id : 1,
                            'file_pdf' => 'pdf/ppid/renja-rkt/sample-rkt.pdf',
                            'keterangan' => 'Dokumen RKT',
                            'sort_order' => $docOrder++,
                        ]
                    );
                }
            }

            if ($menu['slug'] === 'rencana-strategi') {
                $sampleRenstras = [
                    'Renstra Badan Narkotika Nasional',
                    'Renstra Sekretariat Utama BNN',
                    'Renstra Deputi Bidang Pencegahan BNN',
                    'Renstra Deputi Bidang Rehabilitasi BNN',
                ];

                $docOrder = 1;
                foreach ($sampleRenstras as $judulRenstra) {
                    PpidDocument::updateOrCreate(
                        [
                            'ppid_category_id' => $cat->id,
                            'nama_dokumen' => $judulRenstra,
                            'tahun' => 'Tahun 2020 - 2024',
                        ],
                        [
                            'user_id' => $admin ? $admin->id : 1,
                            'file_pdf' => 'pdf/ppid/rencana-strategi/sample-renstra.pdf',
                            'keterangan' => 'Dokumen Renstra',
                            'sort_order' => $docOrder++,
                        ]
                    );
                }
            }
        }
    }
}
