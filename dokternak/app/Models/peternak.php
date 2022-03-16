<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class peternak extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'email', 'is_admin','password',
    ];

    public function roles(){
    	return $this->belongsTo(Role::class);
    }
}
