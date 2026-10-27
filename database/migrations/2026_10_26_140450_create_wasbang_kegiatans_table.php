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
        Schema::create('wasbang_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->string('kategori')->default('Wawasan Kebangsaan');
            $table->date('tanggal');
            $table->string('hari', 30);
            $table->string('waktu', 50)->nullable();
            $table->string('lokasi');
            $table->string('sasaran_peserta')->nullable();
            $table->string('pelaksana')->default('Bidang Bina Ideologi, Wawasan Kebangsaan & Karakter Bangsa');
            $table->text('rincian');
            $table->string('status', 50)->default('Selesai Dilaksanakan');
            $table->string('foto')->nullable();
            $table->text('foto_tambahan')->nullable(); // JSON formatted for multiple images
            $table->string('video')->nullable();
            $table->string('video_url')->nullable(); // link embed or external video stream
            $table->string('dokumen_laporan')->nullable(); // PDF or document report
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wasbang_kegiatans');
    }
};
