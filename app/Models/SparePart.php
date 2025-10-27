<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparePart extends Model
{
    use HasFactory;

    // Jika nama tabel di database bukan 'spare_parts', ubah sesuai nama tabel aslinya
    protected $table = 'parts'; // atau 'spareparts' tergantung isi database kamu

    protected $fillable = [
        'name',
        'partnumber',
        'quantity',
        'location',
    ];
}
