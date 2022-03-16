<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\DB;

class ApiArtikelController extends Controller
{
    public function getAll() 
    {
        // $artikel = Artikel::all();
        $artikel = DB::table('artikel')->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'artikel.id_ktg')
        ->orderBy('id_artikel','desc')->get();
        return response()->json([
            'status' => 'ok',
            'message' => 'Artikel Berhasil Ditampilkan Semua',
            'data' => $artikel
        ], 201);
    }

    public function getArtikel($id) 
    {
        $artikel = Artikel::select('artikel.*','kategori_artikel.*')
        ->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'artikel.id_ktg')
        ->where('artikel.id_artikel',$id)
        ->first();
        ;
        return response()->json([
            'status' => 'ok',
            'message' => 'Artikel Berhasil Ditampilkan per-item',
            'data' => $artikel
        ], 200);
    }

    public function createArtikel(Request $request) 
    {
        Artikel::create($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Artikel Berhasil Ditambahkan!'
        ], 201);
    }

    public function updateArtikel($id, Request $request) 
    {
        Artikel::find($id)->update($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Artikel Berhasil Diubah!'
        ], 201);
    }

    public function deleteArtikel($id) 
    {
        Artikel::destroy($id);

        return response()->json([
            'status' => 'ok',
            'message' => 'Artikel Berhasil Dihapus!'
        ], 201);
    }
    public function cariArtikel(Request $request){
        $cari = $request->judul;
         //mengambul data dari tabel dokter sesuai pencarian data
        //  $petugas =  Dokter::where('nama_dokter','like',"%".$request."%");
        $artikel =  Artikel::select('artikel.*','kategori_artikel.*')
                    ->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'artikel.id_ktg')
                    ->where('judul','like',"%".$cari."%")->get();


            return response()->json([
            'status' => 'ok',
            'message' => 'Artikel yang dicari Berhasil Ditampilkan',
            'data' => $artikel
        ], 201);    
    }

    public function kategoriArtikel(Request $request){
        $cari = $request->kategori_artikel;
         //mengambul data dari tabel dokter sesuai pencarian data
        //  $petugas =  Dokter::where('nama_dokter','like',"%".$request."%");
        $artikel =  Artikel::select('artikel.*','kategori_artikel.*')
                    ->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'artikel.id_ktg')
                    ->where('kategori_artikel.kategori_artikel',$cari)->get();

            return response()->json([
            'status' => 'ok',
            'message' => 'Petugas yang dicari Berhasil Ditampilkan',
            'data' => $artikel
        ], 201);    
    }
}
