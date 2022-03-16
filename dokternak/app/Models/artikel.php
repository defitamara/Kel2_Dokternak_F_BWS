<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id_artikel';
    protected $fillable = [
         'id_ktg', 'tanggal', 'nama_penulis','judul', 'isi', 'gambar', 'sumber','status',
    ];

    public function katart(){
    	return $this->belongsTo(KatArtikel::class);
    }
}
