<?php

namespace Database\Seeders;

use App\Models\BnnLeader;
use Illuminate\Database\Seeder;

class BnnLeaderSeeder extends Seeder
{
    public function run(): void
    {

        BnnLeader::updateOrCreate(
            ['nama_lengkap' => 'Komisaris Besar Polisi Wuryantono, S.I.K.,MH'],
            [
                'pangkat' => 'Komisaris Besar Polisi',
                'nrp' => '77090906',
                'foto' => 'images/assets/public/kepala-bnn/wuryantono.png',
                'tempat_lahir' => 'Madiun',
                'tanggal_lahir' => '3 September 1977',
                'agama' => 'Islam',
                'pendidikan_terakhir' => 'S2 Magister Hukum',
                'mulai_menjabat' => '15 November 2023',
                'akhir_menjabat' => 'Sekarang',
                'periode' => '2023 - Sekarang',
                'is_active' => true,
                'sort_order' => 1,
                'biografi' => 'Menjabat sebagai Kepala Badan Narkotika Nasional Kota Banjarmasin sejak 15 November 2023 hingga saat ini.',
            ]
        );

        BnnLeader::updateOrCreate(
            ['nama_lengkap' => 'Komisaris Besar Polisi H. Siswo P., S.I.K., M.Si'],
            [
                'pangkat' => 'Komisaris Besar Polisi',
                'nrp' => '72050301',
                'foto' => null,
                'tempat_lahir' => 'Banjarmasin',
                'tanggal_lahir' => '12 Mei 1972',
                'agama' => 'Islam',
                'pendidikan_terakhir' => 'S2 Ilmu Administrasi',
                'mulai_menjabat' => '10 Januari 2020',
                'akhir_menjabat' => '14 November 2023',
                'periode' => '2020 - 2023',
                'is_active' => false,
                'sort_order' => 2,
                'biografi' => 'Memimpin berbagai program pencegahan dan pemberantasan narkotika di Kota Banjarmasin pada periode 2020 hingga 2023.',
            ]
        );
    }
}
