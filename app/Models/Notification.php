<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    // Sesuaikan nama tabel sesuai database kamu
    protected $table = 'notifications'; // ganti kalau tabel kamu beda

    protected $fillable = [
        'type',
        'message',
        'created_at'
    ];

    // Jika kamu tidak punya kolom updated_at
    public $timestamps = false;
}
