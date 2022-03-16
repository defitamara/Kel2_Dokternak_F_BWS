<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokter_obat extends Model
{
    protected $table = 'dokter_obat';
    protected $primaryKey = 'id_do';
    protected $fillable = [
        'id_do', 'id_dokter', 'id_obat',
    ];
}
