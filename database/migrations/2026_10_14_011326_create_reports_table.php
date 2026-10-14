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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('category', 60)->index(); // 'penyalahgunaan_narkoba', 'aspirasi_masyarakat', 'whistleblowing', 'pelaporan_gratifikasi'
            $table->string('ticket_number', 50)->unique();
            $table->string('title');
            $table->longText('description');
            $table->date('incident_date')->nullable();
            $table->string('incident_location')->nullable();
            $table->string('suspect_name')->nullable();
            $table->string('evidence_file')->nullable();
            $table->enum('status', ['pending', 'diproses', 'selesai', 'ditolak'])->default('pending')->index();
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
