<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;

class ApiPetugasController extends Controller
{
    public function getAll() 
    {
        $petugas = Dokter::select('dokter.*','jabatan.*')
        ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
        ->get();
        return response()->json([
            'status' => 'ok',
            'message' => 'Petugas Berhasil Ditampilkan Semua',
            'data' => $petugas
        ], 201);
    }

    public function getPetugas($id) 
    {
        $petugas = Dokter::select('dokter.*','jabatan.*')
        ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
        ->where('dokter.id_dokter',$id)
        ->first();
        return response()->json([
            'status' => 'ok',
            'message' => 'Petugas Berhasil Ditampilkan per-item',
            'data' => $petugas
        ], 200);
    }

    public function createPetugas(Request $request) 
    {
        Dokter::create($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Petugas Berhasil Ditambahkan!'
        ], 201);
    }

    public function updatePetugas($id, Request $request) 
    {
        Dokter::find($id)->update($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Petugas Berhasil Dirubah!'
        ], 201);
    }

    public function deletePetugas($id) 
    {
        Dokter::destroy($id);

        return response()->json([
            'status' => 'ok',
            'message' => 'Petugas Berhasil Dihapus!'
        ], 201);
    }

    public function cariPetugas(Request $request){
        $cari = $request->nama_dokter;
         //mengambul data dari tabel dokter sesuai pencarian data
        //  $petugas =  Dokter::where('nama_dokter','like',"%".$request."%");
        $petugas =  Dokter::select('dokter.*','jabatan.*')
        ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
        ->where('nama_dokter','like',"%".$cari."%")->get();


            return response()->json([
            'status' => 'ok',
            'message' => 'Petugas yang dicari Berhasil Ditampilkan',
            'data' => $petugas
        ], 201);    
    }

    public function kategoriPetugas(Request $request){
        $cari = $request->jabatan;
         //mengambul data dari tabel dokter sesuai pencarian data
        //  $petugas =  Dokter::where('nama_dokter','like',"%".$request."%");
        $petugas =  Dokter::select('dokter.*','jabatan.*')
                    ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
                    ->where('jabatan.jabatan',$cari)->get();

            return response()->json([
            'status' => 'ok',
            'message' => 'Petugas yang dicari Berhasil Ditampilkan',
            'data' => $petugas
        ], 201);    
    }

    public function terdekatPetugas(Request $request){
        $cari = $request->alamat;
         //mengambul data dari tabel dokter sesuai pencarian data
        //  $petugas =  Dokter::where('nama_dokter','like',"%".$request."%");
        $petugas =  Dokter::select('dokter.*','jabatan.*')
                        ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
                        ->where('alamat','like',"%".$cari."%")->get();

            return response()->json([
            'status' => 'ok',
            'message' => 'Petugas yang terdekat Berhasil Ditampilkan',
            'data' => $petugas
        ], 201);    
    }
}
