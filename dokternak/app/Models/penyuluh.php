<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyuluh extends Model
{
    public $timestamps = false;
    protected $table = 'penyuluh';
    protected $primaryKey = 'id_penyuluh';
    protected $fillable = [
        'id_penyuluh', 'nama_penyuluh', 'email', 'jenis_kelamin', 'alamat','tempat', 'telpon', 'foto', 'sertifikasi','jadwal_kerja','username','password','verifikasi','id',
    ];
}