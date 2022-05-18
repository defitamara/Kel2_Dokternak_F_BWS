<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoordinatorPuskeswan extends Model
{
    public $timestamps = false;
    protected $table = 'koordinator_puskeswan';
    protected $primaryKey = 'id_kp';
    protected $fillable = [
        'id_kp', 'nama_kp', 'jabatan', 'jenis_kelamin', 'telpon', 'alamat', 'foto', 'id_puskeswan', 'id',
    ];
}
