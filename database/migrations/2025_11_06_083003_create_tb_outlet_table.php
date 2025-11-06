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
        Schema::create('tb_outlet', function (Blueprint $table) {
            $table->integer('id_outlet', true);
            $table->string('nama_outlet', 100);
            $table->text('alamat')->nullable();
            $table->string('telepon', 15)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_outlet');
    }
};
