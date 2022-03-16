<?php

namespace App\Http\Controllers\penyuluh;
use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TutorialController extends Controller
{
    public function index()
    {
        $tutorial = DB::table('tutorial')->get();
        // $peternak = DB::table('peternak')->get();
        // return view('backend.peternak.index',compact('peternak'));
        return view('penyuluh.tutorial',compact('tutorial'))->with('tutorial', $tutorial);
    }

    public function detail($id) {
        $tutorial = DB::table('tutorial')->where('id_tutorial',$id)->first();
        return view('penyuluh.detailtutorial',compact('tutorial'));
    }
}