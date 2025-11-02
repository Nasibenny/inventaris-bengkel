<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'tb_service';
    protected $primaryKey = 'id_service';
    public $timestamps = false;

    protected $fillable = [
        'kode_invoice',
        'id_outlet',
        'id_customer',
        'id_user',
        'tgl_masuk',
        'tgl_selesai',
        'biaya_tambahan',
        'diskon',
        'pajak',
        'status',
        'pembayaran',
    ];

    /**
     * Relasi ke tabel detail service
     * Satu transaksi memiliki banyak detail (sparepart)
     */
    public function details()
    {
        return $this->hasMany(ServiceDetail::class, 'id_service', 'id_service');
    }

    /**
     * Relasi ke tabel customer
     * Setiap transaksi dimiliki oleh satu customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id_customer');
    }

    /**
     * Relasi ke tabel user (mekanik/admin yang menangani transaksi)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    /**
     * (Opsional) Hitung total harga sparepart dalam transaksi ini
     * Bisa digunakan di tampilan detail transaksi
     */
    public function getTotalHargaAttribute()
    {
        return $this->details->sum(function ($detail) {
            return $detail->qty * $detail->harga;
        });
    }

    /**
     * (Opsional) Format status agar huruf pertama kapital otomatis
     */
    public function getFormattedStatusAttribute()
    {
        return ucfirst($this->status);
    }
}
