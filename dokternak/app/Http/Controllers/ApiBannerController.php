<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\banner;

class ApiBannerController extends Controller
{
    public function getAll() 
    {
        $banner = banner::all();
        return response()->json($banner, 201);
    }

    public function getBn($id) 
    {
        $banner = banner::find($id);
        return response()->json($banner, 200);
    }

    public function createBn(Request $request) 
    {
        banner::create($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Banner Berhasil Ditambahkan!'
        ], 201);
    }

    public function updateBn($id, Request $request) {
        banner::find($id)->update($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Banner Berhasil Dirubah!'
        ], 201);
    }

    public function deleteBn($id) 
    {
        banner::destroy($id);

        return response()->json([
            'status' => 'ok',
            'message' => 'Banner Berhasil Dihapus!'
        ], 201);
    }
}

