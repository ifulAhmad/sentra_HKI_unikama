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
        Schema::create('copyright_sub_types', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('type');
            $table->foreignId('copyright_id')
                ->constrained('copyright_types')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copyright_sub_types');
    }
};
