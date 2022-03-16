<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;

class ApiTutorialController extends Controller
{
    public function getAll() 
    {
        $tutorial = Tutorial::all();
        return response()->json($tutorial, 201);
    }

    public function getTutorial($id) 
    {
        $tutorial = Tutorial::find($id);
        return response()->json($tutorial, 200);
    }

    public function createTutorial(Request $request) 
    {
        Tutorial::create($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Tutorial Berhasil Ditambahkan!'
        ], 201);
    }

    public function updateTutorial($id, Request $request) 
    {
        Tutorial::find($id)->update($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Tutorial Berhasil Dirubah!'
        ], 201);
    }

    public function deleteTutorial($id) 
    {
        Tutorial::destroy($id);

        return response()->json([
            'status' => 'ok',
            'message' => 'Tutorial Berhasil Dihapus!'
        ], 201);
    }
}
