<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumentasi;

class ApiDokumentasiController extends Controller
{
    public function getAll() 
    {
        $dokumentasi = Dokumentasi::all();
        return response()->json([
            'status' => 'ok',
            'message' => 'Dokumentasi Berhasil Ditampilkan Semua',
            'data' => $dokumentasi
        ], 201);
    }

    public function getDokumentasi($id) 
    {
        $dokumentasi = Dokumentasi::find($id);
        return response()->json([
            'status' => 'ok',
            'message' => 'Dokumentasi Berhasil Ditampilkan per-item',
            'data' => $dokumentasi
        ], 200);
    }

    public function createDokumentasi(Request $request) 
    {
        Dokumentasi::create($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Dokumentasi Berhasil Ditambahkan!'
        ], 201);
    }

    public function updateDokumentasi($id, Request $request) 
    {
        Dokumentasi::find($id)->update($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Dokumentasi Berhasil Dirubah!'
        ], 201);
    }

    public function deleteDokumentasi($id) 
    {
        Dokumentasi::destroy($id);

        return response()->json([
            'status' => 'ok',
            'message' => 'Dokumentasi Berhasil Dihapus!'
        ], 201);
    }
}
