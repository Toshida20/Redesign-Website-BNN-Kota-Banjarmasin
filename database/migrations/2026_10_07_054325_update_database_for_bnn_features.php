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
        // 1. Drop existing unused/replaced tables
        Schema::dropIfExists('article_tag');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('reports');

        // 2. Media Manager (Untuk menampung Foto / PDF dari modal Author/Editor)
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('file_name');
            $table->string('file_path');
            $table->string('file_type', 50)->nullable(); // image, pdf, document
            $table->string('mime_type')->nullable();
            $table->timestamps();
        });

        // 3. Struktur Divisi & Karyawan (Sesuai foto 1)
        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Contoh: Bidang Pencegahan dan Pemberdayaan Masyarakat
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id')->constrained('divisions')->onDelete('cascade');
            $table->string('nama');
            $table->string('nip_nrp')->nullable();
            $table->string('pangkat_gol')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('status_pegawai')->nullable();
            $table->string('periode_tahun')->nullable(); // Contoh: "Juli 2026" / "2024"
            $table->timestamps();
        });

        // Tambah relasi divisi ke kategori (Agar berita terkait otomatis muncul di page Divisi)
        Schema::table('categories', function (Blueprint $table) {
            $table->foreignId('division_id')->nullable()->constrained('divisions')->nullOnDelete();
        });

        // 4. Struktur Laporan LHKPN & PPID (Tabel Dinamis + File) (Sesuai foto 2, 3, 4)
        Schema::create('report_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('type')->default('lhkpn'); // 'ppid' atau 'lhkpn'
            $table->timestamps();
        });

        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('report_category_id')->nullable()->constrained('report_categories')->nullOnDelete();
            $table->enum('type', ['ppid', 'lhkpn'])->default('lhkpn');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->unsignedBigInteger('views_count')->default(0);
            $table->timestamps();
        });

        // Bagian custom-report-table (Contoh: "1. Laporan data penggunaan narkotika Tahun 2024")
        Schema::create('publication_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('publication_id')->constrained('publications')->onDelete('cascade');
            $table->string('title'); 
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // File-file (row) di dalam custom-report-table
        Schema::create('publication_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('publication_section_id')->constrained('publication_sections')->onDelete('cascade');
            $table->string('document_name');
            $table->string('file_path');
            $table->string('keterangan')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // 5. Fitur Konfigurasi Navbar Admin (Rencana / Opsional)
        Schema::create('navbar_menus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('navbar_menus')->onDelete('cascade');
            $table->string('position')->default('upper'); // 'upper' atau 'lower'
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navbar_menus');
        Schema::dropIfExists('publication_files');
        Schema::dropIfExists('publication_sections');
        Schema::dropIfExists('publications');
        Schema::dropIfExists('report_categories');
        
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['division_id']);
            $table->dropColumn('division_id');
        });

        Schema::dropIfExists('employees');
        Schema::dropIfExists('divisions');
        Schema::dropIfExists('media');

        // Untuk rollback, kita kembalikan table yang di drop (skeletonnya saja)
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        Schema::create('article_tag', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }
};
