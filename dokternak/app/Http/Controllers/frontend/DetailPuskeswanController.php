<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailPuskeswanController extends Controller
{
    public function index()
    {
        $data_puskeswan = DB::table('puskeswan')->get();
        // $peternak = DB::table('peternak')->get();
        // return view('backend.peternak.index',compact('peternak'));
        return view('frontend.detailpuskeswan',compact('puskeswan'))->with('puskeswan', $data_puskeswan);;
    }

    public function detail($id) {
        return view('frontend.detailpuskeswan',compact('puskeswan'));
    }
}