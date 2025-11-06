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
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->integer('id_transaksi', true);
            $table->string('kode_invoice', 100)->unique('kode_invoice');
            $table->integer('id_outlet')->nullable()->index('id_outlet');
            $table->integer('id_user')->nullable()->index('id_user');
            $table->dateTime('tgl_masuk')->nullable()->useCurrent();
            $table->enum('status', ['baru', 'proses', 'selesai', 'diambil'])->nullable()->default('baru');
            $table->enum('pembayaran', ['dibayar', 'belum_dibayar'])->nullable()->default('belum_dibayar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_transaksi');
    }
};
