<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\penyuluh;

class PenyuluhController extends Controller
{
    
    public function index()
    {
        $penyuluh = DB::table('penyuluh')->paginate(3);
        return view('frontend.penyuluh',compact('penyuluh'));
    }

    public function cari(Request $request)
    {
        //Menangkap data pencarian
        $cari = $request->cari;
        $penyuluh = DB::table('penyuluh')
        ->where('nama_penyuluh'.'LIKE'. "%".$cari."%")
        ->paginate(2);

        //mengambil data dari tabel puskeswan sesuai pencarian data
        $puskeswan = DB::table('penyuluh')
        ->where('nama_penyuluh','like',"%".$cari."%")
        ->paginate(2);
        //mengirim data puskeswan ke view puskeswan
        return view('frontend.penyuluh',compact('penyuluh'));
    }

    // public function kategori(Request $request)
    // {
    //     //Menangkap data pencarian
    //     // $cari = $request->cari;

    //     // //mengambul data dari tabel artikel sesuai pencarian data
    //     // $dokter = DB::table('dokter')
    //     // ->where('nama_dokter','like',"%".$cari."%")
    //     // ->paginate(2);

    //     // //mengirim data artikel ke view artikel
    //     // return view('frontend.dokter',compact('dokter'));

    //             //Menangkap data pencarian
    //             $kategori = $request->cari;

    //             //mengambul data dari tabel artikel sesuai pencarian data
    //             // $dokter = DB::table('dokter')
    //             // ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_dokter')
    //             // ->where('nama_dokter','like',"%".$cari."%")
    //             // ->paginate(3);
    //             $kode = 11;
    //             $dokter = DB::table('dokter')
    //                 ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
    //                 ->where('jabatan',$kategori)
    //                 ->paginate(4);
    //             //mengirim data artikel ke view artikel
    //             return view('frontend.dokter',compact('dokter','kode'));
                    
    // }


    public function detail($id) {
        if(!Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        $penyuluh = DB::table('penyuluh')->where('id_penyuluh',$id)->first();
        return view('frontend.detailpenyuluh',compact('penyuluh'));
    }

}
