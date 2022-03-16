<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    protected $table = 'konsultasi';
    protected $primaryKey = 'id_konsultasi';
    protected $fillable = [
        'id_konsultasi', 'id_peternak', 'id_dokter','id_kategori','id_ktg','nama_hewan','keluhan','tanggal', 'status_kirim',
    ];

    
}
