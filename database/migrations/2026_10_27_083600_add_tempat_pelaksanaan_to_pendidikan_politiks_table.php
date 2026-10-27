<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pendidikan_politiks', function (Blueprint $table) {
            if (!Schema::hasColumn('pendidikan_politiks', 'tempat_pelaksanaan')) {
                $table->string('tempat_pelaksanaan')->nullable()->after('tanggal_pelaksanaan');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pendidikan_politiks', function (Blueprint $table) {
            if (Schema::hasColumn('pendidikan_politiks', 'tempat_pelaksanaan')) {
                $table->dropColumn('tempat_pelaksanaan');
            }
        });
    }
};
