<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KatHewan extends Model
{
    protected $table = 'kategori_hewan';
    protected $primaryKey = 'id_kategori';
    protected $fillable = [
        'id_kategori', 'kategori_hewan',
    ];
}
