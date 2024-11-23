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
        Schema::create('submission_files', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('submission_uuid')->references('uuid')->on('submissions')->onDelete('cascade');
            $table->text('link_ciptaan');
            $table->text('file_pernyataan_karya_cipta');
            $table->text('file_pengalihan_karya_cipta')->nullable();
            $table->text('file_scan_ktp');
            $table->text('file_bukti_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submission_files');
    }
};
