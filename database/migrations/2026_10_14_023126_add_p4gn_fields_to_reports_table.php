<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->string('pelapor_phone', 30)->nullable()->after('user_id');
            $table->json('pelapor_address')->nullable()->after('pelapor_phone');

            $table->string('terlapor_name')->nullable()->after('pelapor_address');
            $table->string('terlapor_phone', 30)->nullable()->after('terlapor_name');
            $table->json('terlapor_address')->nullable()->after('terlapor_phone');

            $table->json('lokasi_photos')->nullable()->after('terlapor_address');

            $table->json('jenis_narkoba')->nullable()->after('lokasi_photos');
            $table->string('jumlah_narkoba')->nullable()->after('jenis_narkoba');
            $table->string('peran_terlapor')->nullable()->after('jumlah_narkoba');
            $table->string('pekerjaan_terlapor')->nullable()->after('peran_terlapor');
            $table->json('alamat_kejadian')->nullable()->after('pekerjaan_terlapor');

            $table->string('kendaraan_terlapor')->nullable()->after('alamat_kejadian');
            $table->json('kendaraan_photos')->nullable()->after('kendaraan_terlapor');

            $table->text('uraian_transaksi')->nullable()->after('kendaraan_photos');
            $table->text('lokasi_nongkrong')->nullable()->after('uraian_transaksi');
            $table->text('sumber_informasi')->nullable()->after('lokasi_nongkrong');
            $table->boolean('pernyataan_valid')->default(false)->after('sumber_informasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropColumn([
                'pelapor_phone',
                'pelapor_address',
                'terlapor_name',
                'terlapor_phone',
                'terlapor_address',
                'lokasi_photos',
                'jenis_narkoba',
                'jumlah_narkoba',
                'peran_terlapor',
                'pekerjaan_terlapor',
                'alamat_kejadian',
                'kendaraan_terlapor',
                'kendaraan_photos',
                'uraian_transaksi',
                'lokasi_nongkrong',
                'sumber_informasi',
                'pernyataan_valid',
            ]);
        });
    }
};
