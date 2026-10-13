<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('bnn_leaders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();

            $table->string('nama_lengkap');
            $table->string('pangkat')->nullable();
            $table->string('nrp')->nullable();
            $table->string('foto')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            
            $table->string('mulai_menjabat')->nullable();
            $table->string('akhir_menjabat')->nullable();
            $table->string('periode')->nullable();       

            $table->boolean('is_active')->default(false);
            $table->integer('sort_order')->default(0);
            $table->text('biografi')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bnn_leaders');
    }
};
