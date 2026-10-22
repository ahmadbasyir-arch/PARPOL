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
        Schema::create('pendidikan_politiks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parpol_id')->constrained('parpols')->onDelete('cascade');
            $table->string('nama_kegiatan');
            $table->string('tanggal_pelaksanaan');
            $table->integer('peserta_jumlah');
            $table->boolean('peserta_kader')->default(true);
            $table->integer('peserta_masyarakat')->default(0);
            $table->bigInteger('jumlah_biaya');
            $table->string('dokumentasi')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikan_politiks');
    }
};
