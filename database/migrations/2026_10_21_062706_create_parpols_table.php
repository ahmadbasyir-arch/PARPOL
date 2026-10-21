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
        Schema::create('parpols', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('nomor_urut');
            $table->string('nama_partai');
            $table->string('akronim', 50);
            $table->string('logo')->nullable();
            $table->string('warna_primer', 20)->default('#b91c1c');
            $table->string('no_sk');
            $table->string('tanggal_sk')->nullable();
            $table->string('ketua');
            $table->string('no_hp_ketua')->nullable();
            $table->string('sekretaris');
            $table->string('bendahara');
            $table->string('lo_nama');
            $table->string('lo_hp')->nullable();
            $table->text('alamat');
            $table->string('kelurahan_desa')->nullable();
            $table->string('kecamatan')->default('Pelaihari');
            $table->string('kabupaten')->default('Tanah Laut');
            $table->string('provinsi')->default('Kalimantan Selatan');
            $table->string('sk3p3')->default('Ada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parpols');
    }
};
