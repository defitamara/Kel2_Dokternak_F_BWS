<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kritikdansaran;

class ApiKritikdanSaranController extends Controller
{
    public function getAll() 
    {
        $ks = kritikdansaran::all();
        return response()->json($ks, 201);
    }

    public function getKs($id) 
    {
        $ks = kritikdansaran::find($id);
        return response()->json($ks, 200);
    }

    public function createKs(Request $request) 
    {
        kritikdansaran::create($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Kritik dan Saran Berhasil Ditambahkan!'
        ], 201);
    }

    public function updateKs($id, Request $request) 
    {
        kritikdansaran::find($id)->update($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Kritik dan Saran Berhasil Dirubah!'
        ], 201);
    }

    public function deleteKs($id) 
    {
        kritikdansaran::destroy($id);

        return response()->json([
            'status' => 'ok',
            'message' => 'Artikel Berhasil Dihapus!'
        ], 201);
    }
}
