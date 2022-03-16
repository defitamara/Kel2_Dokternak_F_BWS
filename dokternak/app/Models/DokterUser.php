<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokterUser extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'id_dokter';
    protected $fillable = [
        'id_dokter', 'nama_dokter', 'email', 'jenis_kelamin', 'alamat','tempat', 'telpon', 'foto', 'sertifikasi','id_jabatan','jadwal_kerja','id','verifikasi','failed_at',
    ];
}
