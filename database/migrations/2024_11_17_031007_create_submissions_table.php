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
        Schema::create('submissions', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->enum('skema', ['umum', 'lembaga']);
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('negara')->default('Indonesia');
            $table->string('kota');
            $table->enum('status', ['diterima', 'ditolak', 'menunggu', 'proses', 'revisi'])->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
