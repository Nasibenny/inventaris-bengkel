<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
    protected $table = 'tb_detail_service';
    protected $primaryKey = 'id_detail';
    public $timestamps = false;

    protected $fillable = [
        'id_service',
        'id_sparepart',
        'qty',
        'harga',
        'keterangan',
    ];

    public function sparepart()
    {
        return $this->belongsTo(SparePart::class, 'id_sparepart', 'id_sparepart');
    }
}
