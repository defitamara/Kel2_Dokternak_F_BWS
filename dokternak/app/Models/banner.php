<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    public $timestamps = false;
    protected $table = 'banner';
    protected $primaryKey = 'id_banner';
    protected $fillable = [
        'id_banner', 'gambar', 'status',
    ];
}
