<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id_role';
    protected $fillable = [
        'id_role', 'nama_role',
    ];
    public function users(){
    	return $this->hasMany(peternak::class);
    }

    public function admins(){
    	return $this->hasMany(admin::class);
    }

    public function petugas(){
    	return $this->hasMany(Petugas::class);
    }
}
