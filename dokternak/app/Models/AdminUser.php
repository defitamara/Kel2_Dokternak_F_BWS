<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $fillable = [
        'id_admin', 'nama', 'email', 'jenis_kelamin', 'alamat','foto', 'id', 'created_at', 'updated_at',
    ];
}
