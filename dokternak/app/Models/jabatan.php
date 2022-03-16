<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    protected $table = 'jabatan';
    protected $primaryKey = 'id_jabatan';
    protected $fillable = [
        'id_jabatan', 'jabatan',
    ];
    public function dokters(){
    	return $this->hasMany(Dokterl::class);
    }
}
