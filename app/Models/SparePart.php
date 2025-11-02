<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SparePart extends Model
{
    protected $table = 'tb_sparepart';
    protected $primaryKey = 'id_sparepart';
    public $timestamps = false;

    protected $fillable = [
        'nama_sparepart',
        'jenis',
        'stok',
        'harga',
    ];
}
