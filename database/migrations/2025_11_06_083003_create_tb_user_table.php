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
        Schema::create('tb_user', function (Blueprint $table) {
            $table->integer('id_user', true);
            $table->string('nama', 100);
            $table->string('username', 50)->unique('username');
            $table->text('password');
            $table->integer('id_outlet')->nullable()->index('id_outlet');
            $table->enum('role', ['admin', 'owner'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_user');
    }
};
