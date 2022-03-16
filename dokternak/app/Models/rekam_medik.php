<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekam_medik extends Model
{
    protected $table = 'rekam_medik';
    protected $primaryKey = 'id_rmd';
    protected $fillable = [
        'id_rmd', 'tanggal', 'id_kategori', 'id_ktg', 'nama_hewan', 'nama_peternak','alamat','keluhan','diagnosa','pelayanan',
    ];
}
