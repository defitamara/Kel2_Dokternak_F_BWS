<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KatArtikel;
use Illuminate\Http\Request;

class ApiJenisHewanController extends Controller
{
    public function getAll() 
    {
        $konsultasi = KatArtikel::all();
        return response()->json([
            'status' => 'ok',
            'message' => 'Konsultasi terkirim Berhasil Ditampilkan Semua',
            'data' => $konsultasi
        ], 201);
    }

    public function cariKategori(Request $request){
        $cari = $request->kategori_artikel;
        $jenisHewan =  KatArtikel::where('kategori_artikel','like',"%".$cari."%")->get();
           return response()->json([
           'status' => 'ok',
           'message' => 'Jenis Hewan yang dicari Berhasil Ditampilkan',
           'data' => $jenisHewan
        ], 201);     
    }
}
