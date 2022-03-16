<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kritikdansaran extends Model
{
    protected $table = 'krtik_dan_saran';
    protected $primaryKey = 'id_ks';
    protected $fillable = [
         'id_ks', 'tanggal', 'komentar','nama', 'email_hp', 'pekerjaan',
    ];
}
