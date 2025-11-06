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
        Schema::table('tb_sparepart', function (Blueprint $table) {
            $table->foreign(['id_outlet'], 'tb_sparepart_ibfk_1')->references(['id_outlet'])->on('tb_outlet')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_sparepart', function (Blueprint $table) {
            $table->dropForeign('tb_sparepart_ibfk_1');
        });
    }
};
