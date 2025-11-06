<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BengkelSeeder extends Seeder
{
    public function run(): void
    {
        // 🏢 Data outlet
        DB::table('tb_outlet')->insert([
            [
            'nama_outlet' => 'Yamaha Motor Service Center',
            'alamat' => 'Jl. Sudirman No. 88, Jakarta',
            'telepon' => '0219876543',
            ],
            [
            'nama_outlet' => 'Honda Auto Care',
            'alamat' => 'Jl. Thamrin No. 45, Jakarta',
            'telepon' => '0211234567',
            ],
        ]);

        // 👤 Data user (Owner, Admin, Kasir, Mekanik)
        DB::table('tb_user')->insert([
            [
                'nama' => 'briw',
                'username' => 'owner',
                'password' => Hash::make('owner123'),
                'id_outlet' => 1,
                'role' => 'owner',
            ],
            [
                'nama' => 'icikiwir',
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'id_outlet' => 1,
                'role' => 'admin',
            ],
            [
                'nama' => 'anjy',
                'username' => 'owner1',
                'password' => Hash::make('owner123'),
                'id_outlet' => 2,
                'role' => 'owner',
            ],
            [
                'nama' => 'Utama',
                'username' => 'admin1',
                'password' => Hash::make('admin123'),
                'id_outlet' => 2,
                'role' => 'admin',
            ],
        ]);

        // ⚙️ Data sparepart contoh
        DB::table('tb_sparepart')->insert([
            [
                'id_outlet' => 1,
                'nama_sparepart' => 'Oli Yamalube',
                'kode_sparepart' => 'SP001',
                'jenis' => 'oli',
                'stok' => 10,
                'harga' => 50000,
            ],
            [
                'id_outlet' => 1,
                'nama_sparepart' => 'Busi NGK',
                'kode_sparepart' => 'SP002',
                'jenis' => 'busi',
                'stok' => 15,
                'harga' => 25000,
            ],
            [
                'id_outlet' => 2,
                'nama_sparepart' => 'Busi NGKwdwd',
                'kode_sparepart' => 'SP002',
                'jenis' => 'busi',
                'stok' => 15,
                'harga' => 25000,
            ],
            [
                'id_outlet' => 2,
                'nama_sparepart' => 'Busi NGKdwwd',
                'kode_sparepart' => 'SP002',
                'jenis' => 'busi',
                'stok' => 15,
                'harga' => 25000,
            ],
        ]);
    }
}
