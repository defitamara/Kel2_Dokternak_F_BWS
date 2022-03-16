<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PuskeswanController extends Controller
{
    public function index()
    {
        $puskeswan = DB::table('puskeswan')->paginate(3);
        // $peternak = DB::table('peternak')->get();
        // return view('backend.peternak.index',compact('peternak'));
        return view('frontend.puskeswan',compact('puskeswan'))->with('puskeswan', $puskeswan);;
    }

    public function cari(Request $request)
    {
        //Menangkap data pencarian
        $cari = $request->cari;

        //mengambil data dari tabel puskeswan sesuai pencarian data
        $puskeswan = DB::table('puskeswan')
        ->where('nama_puskeswan','like',"%".$cari."%")
        ->paginate(2);
        //mengirim data puskeswan ke view puskeswan
        return view('frontend.puskeswan',compact('puskeswan'));
    }

    public function detail($id)
    {
        $puskeswan = DB::table('puskeswan')->where('id_puskeswan',$id)->first();

        $petugas = DB::table('dokter_puskeswan')
                    ->join('dokter','dokter.id_dokter','=','dokter_puskeswan.id_dokter')
                    ->join('jabatan','jabatan.id_jabatan','=','dokter.id_jabatan')
                    ->where('id_puskeswan',$id)
                    ->get();
                    
        return view('frontend.detailpuskeswan',compact('puskeswan','petugas'));
    }

}
