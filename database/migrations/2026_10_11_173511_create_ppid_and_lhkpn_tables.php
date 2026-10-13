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
        // 0. Bersihkan tabel generic lama
        Schema::dropIfExists('publication_files');
        Schema::dropIfExists('publication_sections');
        Schema::dropIfExists('publications');
        Schema::dropIfExists('report_categories');

        // =========================================================================
        // 1. MODUL INFORMASI PUBLIK (PPID) — HANYA BERISI 12 KATEGORI MENU & LINK PDF
        //    (Sesuai Foto 2 dan 12 Folder di public/pdf/ppid)
        // =========================================================================
        Schema::create('ppid_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Contoh: "Renja / RKT", "Rencana Strategi", "Peraturan"
            $table->string('slug')->unique(); // Sesuai folder: renja-rkt, rencana-strategi, dll
            $table->string('icon')->nullable(); // Class icon (contoh: bi bi-journal-text)
            $table->integer('sort_order')->default(1);
            $table->timestamps();
        });

        Schema::create('ppid_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ppid_category_id')->constrained('ppid_categories')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete(); // Editor pengunggah
            $table->string('nama_dokumen'); // Contoh: "RKT Badan Narkotika Nasional"
            $table->string('tahun')->nullable(); // Contoh: "Tahun 2021", "2020 - 2024"
            $table->string('file_pdf'); // Path PDF: "pdf/ppid/renja-rkt/nama-file.pdf"
            $table->string('keterangan')->nullable();
            $table->unsignedInteger('download_count')->default(0);
            $table->integer('sort_order')->default(1);
            $table->timestamps();
        });

        // =========================================================================
        // 2. MODUL LHKPN (TABEL LAPORAN CUSTOM, TABEL-TABEL, PEJABAT & DOKUMEN)
        //    (Menggantikan nama ppid_ sebelumnya menjadi lhkpn_)
        // =========================================================================
        Schema::create('lhkpn_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Contoh: 'Pengadaan Barang dan Jasa', 'Tahap Pemilihan', 'LHKPN Pejabat'
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('lhkpn_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('title'); // Contoh: "Laporan Harta Kekayaan Pejabat Negara..." atau "Pengadaan Barang & Jasa"
            $table->string('slug')->unique();
            $table->string('periode')->nullable();
            $table->string('thumbnail')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->unsignedBigInteger('views_count')->default(0);
            $table->enum('status', ['draft', 'published'])->default('published');
            $table->timestamps();
        });

        Schema::create('lhkpn_report_category', function (Blueprint $table) {
            $table->foreignId('lhkpn_report_id')->constrained('lhkpn_reports')->onDelete('cascade');
            $table->foreignId('lhkpn_category_id')->constrained('lhkpn_categories')->onDelete('cascade');
            $table->primary(['lhkpn_report_id', 'lhkpn_category_id']);
        });

        // Custom Tables di dalam LHKPN (Contoh: "1. PENGADAAN REAGEN...", "2. PENGADAAN PAKAN...")
        Schema::create('lhkpn_tables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lhkpn_report_id')->constrained('lhkpn_reports')->onDelete('cascade');
            $table->integer('table_number')->default(1); // 1., 2., dst
            $table->string('title');
            $table->integer('sort_order')->default(1);
            $table->timestamps();
        });

        // Dokumen di dalam Custom Table LHKPN
        Schema::create('lhkpn_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lhkpn_table_id')->constrained('lhkpn_tables')->onDelete('cascade');
            $table->string('nama_dokumen');
            $table->string('file_pdf')->nullable();
            $table->string('keterangan')->nullable();
            $table->integer('sort_order')->default(1);
            $table->timestamps();
        });

        // Khusus LHKPN Berbasis Pejabat (Tabel Pejabat BNN RI & Link Tahun)
        Schema::create('lhkpn_pejabats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lhkpn_report_id')->constrained('lhkpn_reports')->onDelete('cascade');
            $table->integer('pejabat_number')->default(1);
            $table->string('nama_jabatan'); // Contoh: "Kepala Badan Narkotika Nasional Republik Indonesia"
            $table->integer('sort_order')->default(1);
            $table->timestamps();
        });

        Schema::create('lhkpn_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lhkpn_pejabat_id')->constrained('lhkpn_pejabats')->onDelete('cascade');
            $table->string('tahun'); // Contoh: "2025", "2024"
            $table->string('judul_laporan'); // Contoh: "LHKPN Tahun 2025"
            $table->string('file_pdf'); // Path PDF di pdf/lhkpn/...
            $table->integer('sort_order')->default(1);
            $table->timestamps();
        });

        // =========================================================================
        // 3. MODUL LAPORAN STATISTIK (Dropdown Accordion Gambar & Tabel)
        // =========================================================================
        Schema::create('statistic_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->unsignedBigInteger('views_count')->default(0);
            $table->enum('status', ['draft', 'published'])->default('published');
            $table->timestamps();
        });

        Schema::create('statistic_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('statistic_report_id')->constrained('statistic_reports')->onDelete('cascade');
            $table->integer('section_number')->default(1);
            $table->string('title');
            $table->enum('type', ['accordion_image', 'table_link'])->default('accordion_image');
            $table->integer('sort_order')->default(1);
            $table->timestamps();
        });

        Schema::create('statistic_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('statistic_section_id')->constrained('statistic_sections')->onDelete('cascade');
            $table->string('tahun_label');
            $table->string('image_path')->nullable(); // KHUSUS GAMBAR (jpg, png, avif)
            $table->string('link_pdf')->nullable();   // PDF jika table_link
            $table->integer('sort_order')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistic_items');
        Schema::dropIfExists('statistic_sections');
        Schema::dropIfExists('statistic_reports');

        Schema::dropIfExists('lhkpn_files');
        Schema::dropIfExists('lhkpn_pejabats');
        Schema::dropIfExists('lhkpn_documents');
        Schema::dropIfExists('lhkpn_tables');
        Schema::dropIfExists('lhkpn_report_category');
        Schema::dropIfExists('lhkpn_reports');
        Schema::dropIfExists('lhkpn_categories');

        Schema::dropIfExists('ppid_documents');
        Schema::dropIfExists('ppid_categories');
    }
};
