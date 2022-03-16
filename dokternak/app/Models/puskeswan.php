<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puskeswan extends Model
{
    protected $table = 'puskeswan';
    protected $primaryKey = 'id_puskeswan';
    protected $fillable =  [
        'id_puskeswan', 'nama_puskeswan', 'alamat', 'jam_kerja', 'gambar','maps', 
    ];
}
