<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokumentasi extends Model
{
    public $timestamps = false;

    protected $table = 'dokumentasi';
    protected $primaryKey = 'id_dokumentasi';
    protected $fillable = [
         'id_dokumentasi', 'judul', 'keterangan','dokumentasi', 'failed_at',
    ];
}
