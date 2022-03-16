<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    protected $table = 'kategori_artikel';

    protected $fillable = [
        'id_ktg',
        'kategorri_artikel'
    ];
}
