<?php

namespace Database\Seeders;

use App\Models\StatisticItem;
use App\Models\StatisticReport;
use App\Models\StatisticSection;
use App\Models\User;
use Illuminate\Database\Seeder;

class StatisticSeeder extends Seeder
{

    public function run(): void
    {
        $admin = User::where('email', 'admin@bnnk.go.id')->first() ?? User::first();

        $report = StatisticReport::updateOrCreate(
            ['slug' => 'rekapitulasi-penanganan-pengaduan-masyarakat-dan-penindakan'],
            [
                'user_id' => $admin ? $admin->id : 1,
                'title' => 'Rekapitulasi Penanganan Pengaduan Masyarakat dan Laporan Penindakan',
                'thumbnail' => 'images/assets/public/logo/logo-bnn.png',
                'published_at' => '2026-08-20 14:00:00',
                'views_count' => 310,
                'status' => 'published',
            ]
        );

        $section1 = StatisticSection::updateOrCreate(
            [
                'statistic_report_id' => $report->id,
                'section_number' => 1,
            ],
            [
                'title' => '1. REKAPITULASI PENANGANAN PENGADUAN MASYARAKAT',
                'type' => 'accordion_image',
                'sort_order' => 1,
            ]
        );

        StatisticItem::updateOrCreate(
            [
                'statistic_section_id' => $section1->id,
                'tahun_label' => '2026',
            ],
            [
                'image_path' => 'images/infografis/dumas_2026.png',
                'sort_order' => 1,
            ]
        );

        foreach (['2025', '2024', '2023'] as $idx => $th) {
            StatisticItem::updateOrCreate(
                [
                    'statistic_section_id' => $section1->id,
                    'tahun_label' => $th,
                ],
                [
                    'image_path' => 'images/infografis/dumas_' . $th . '.png',
                    'sort_order' => $idx + 2,
                ]
            );
        }

        $section2 = StatisticSection::updateOrCreate(
            [
                'statistic_report_id' => $report->id,
                'section_number' => 2,
            ],
            [
                'title' => '2. LAPORAN PENINDAKAN',
                'type' => 'table_link',
                'sort_order' => 2,
            ]
        );

        foreach (['2026', '2025', '2024', '2023'] as $idx => $th) {
            StatisticItem::updateOrCreate(
                [
                    'statistic_section_id' => $section2->id,
                    'tahun_label' => $th,
                ],
                [
                    'link_pdf' => 'files/penindakan/laporan-' . $th . '.pdf',
                    'sort_order' => $idx + 1,
                ]
            );
        }
    }
}
