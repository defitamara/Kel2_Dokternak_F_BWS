<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staf_it extends Model
{
    public $timestamps = false;
    protected $table = 'staf_it';
    protected $primaryKey = 'id_staf';
    protected $fillable = [
        'id_staf', 'nama_staf', 'jabatan', 'jenis_kelamin', 'telpon', 'alamat', 'foto', 'id',
    ];
}
