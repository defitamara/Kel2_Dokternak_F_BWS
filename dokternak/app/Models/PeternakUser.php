<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeternakUser extends Model
{
    protected $table = 'peternak';
    protected $primaryKey = 'id_peternak';
    protected $fillable = [
        'id_peternak', 'namadepan_peternak', 'namabelakang_peternak','email_peternak','no_hp','jenis_kelamin','alamat','foto_peternak','id',
    ];
}
