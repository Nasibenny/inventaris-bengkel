<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'username',
        'password',
        'role', // <--- pastikan ada kolom ini
    ];

    protected $hidden = [
        'password',
    ];

    // 🔹 Helper untuk periksa role
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isKasir()
    {
        return $this->role === 'kasir';
    }

    public function isMekanik()
    {
        return $this->role === 'mekanik';
    }
}
