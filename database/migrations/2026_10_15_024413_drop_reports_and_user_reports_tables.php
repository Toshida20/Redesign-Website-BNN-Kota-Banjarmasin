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
        Schema::dropIfExists('reports');
        Schema::dropIfExists('user_reports');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Fitur pelaporan dialihkan ke aplikasi resmi BOSS BNN (boss.bnn.go.id)
    }
};
