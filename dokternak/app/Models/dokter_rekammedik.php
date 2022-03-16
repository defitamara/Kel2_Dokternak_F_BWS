<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokter_rekammedik extends Model
{
    protected $table = 'dokter_rekammedik';
    protected $primaryKey = 'id_dokmed';
    protected $fillable = [
        '', 'id_dokter', 'id_rmd',
    ];
}
