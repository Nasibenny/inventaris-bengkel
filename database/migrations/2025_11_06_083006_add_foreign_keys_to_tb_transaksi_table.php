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
        Schema::table('tb_transaksi', function (Blueprint $table) {
            $table->foreign(['id_outlet'], 'tb_transaksi_ibfk_1')->references(['id_outlet'])->on('tb_outlet')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['id_user'], 'tb_transaksi_ibfk_3')->references(['id_user'])->on('tb_user')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_transaksi', function (Blueprint $table) {
            $table->dropForeign('tb_transaksi_ibfk_1');
            $table->dropForeign('tb_transaksi_ibfk_3');
        });
    }
};
