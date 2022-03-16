<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponKonsultasi extends Model
{
    protected $table = 'respon_konsultasi';
    protected $primaryKey = 'id_respon';
    protected $fillable = [
        'id_respon', 'id_dokter','respon','tanggal_respon',
    ];

    
}
