<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    protected $table = 'informasi';
    protected $primaryKey = 'id_info';
    protected $fillable = [
        'id_info', 'judul', 'isi','created_at','updated_at',
    ];
}
