<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SparePartSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel tb_sparepart
     */
    public function run(): void
    {
        DB::table('tb_sparepart')->insert([
            [
                'id_outlet' => 2,
                'nama_sparepart' => 'Oli Motor Yamalube',
                'kode_sparepart' => 'SP001',
                'jenis' => 'oli',
                'stok' => 100,
                'harga' => 35000,
            ],
            [
                'id_outlet' => 1,
                'nama_sparepart' => 'Busi Motor NGK',
                'kode_sparepart' => 'SP002',
                'jenis' => 'busi',
                'stok' => 75,
                'harga' => 15000,
            ],
            [
                'id_outlet' => 1,
                'nama_sparepart' => 'Ban Depan IRC',
                'kode_sparepart' => 'SP003',
                'jenis' => 'ban',
                'stok' => 40,
                'harga' => 250000,
            ],
        ]);
    }
}
