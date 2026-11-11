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
        Schema::table('parpols', function (Blueprint $table) {
            $table->text('visi')->nullable()->after('provinsi');
            $table->text('misi')->nullable()->after('visi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parpols', function (Blueprint $table) {
            $table->dropColumn(['visi', 'misi']);
        });
    }
};
