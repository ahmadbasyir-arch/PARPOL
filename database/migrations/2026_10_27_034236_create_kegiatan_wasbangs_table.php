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
        Schema::create('kegiatan_wasbangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->string('kategori'); // Paskibraka, Bela Negara, Karakter Bangsa, Bina Ideologi, Pembauran Kebangsaan
            $table->string('hari'); // Senin, Selasa, dst.
            $table->integer('tanggal'); // 1 - 31
            $table->string('bulan'); // Januari, Februari, dst.
            $table->integer('tahun')->default(2026);
            $table->string('tanggal_lengkap'); // Senin, 01 Juni 2026
            $table->string('tempat_lokasi');
            $table->string('peserta')->nullable();
            $table->text('rincian');
            $table->string('foto')->nullable();
            $table->string('video')->nullable();
            $table->string('berkas_laporan')->nullable();
            $table->string('status')->default('terarsip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan_wasbangs');
    }
};
