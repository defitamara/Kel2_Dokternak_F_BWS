<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokter_puskeswan extends Model
{
    protected $table = 'dokter_puskeswan';
    protected $primaryKey = 'id_dp';
    protected $fillable = [
        '', 'id_puskeswan', 'id_dokter',
    ];
}
