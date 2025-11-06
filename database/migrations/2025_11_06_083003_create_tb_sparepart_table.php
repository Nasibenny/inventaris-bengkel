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
        Schema::create('tb_sparepart', function (Blueprint $table) {
            $table->integer('id_sparepart', true);
            $table->integer('id_outlet')->nullable()->index('id_outlet');
            $table->string('nama_sparepart', 100);
            $table->string('kode_sparepart', 50)->nullable()->unique('kode_sparepart');
            $table->enum('jenis', ['oli', 'busi', 'ban', 'kampas_rem', 'lainnya'])->nullable()->default('lainnya');
            $table->integer('stok')->nullable()->default(0);
            $table->integer('harga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_sparepart');
    }
};
