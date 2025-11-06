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
        Schema::create('tb_detail_transaksi', function (Blueprint $table) {
            $table->integer('id_detail', true);
            $table->integer('id_transaksi')->nullable()->index('id_service');
            $table->integer('id_sparepart')->nullable()->index('id_sparepart');
            $table->double('qty')->nullable()->default(1);
            $table->integer('harga')->nullable()->default(0);
            $table->double('total_harga')->nullable()->storedAs('`qty` * `harga`');
            $table->text('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_detail_transaksi');
    }
};
