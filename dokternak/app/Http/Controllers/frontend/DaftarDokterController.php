<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\dokter;

class DaftarDokterController extends Controller
{
    
    public function index()
    {
        $dokter = DB::table('dokter')->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
        ->paginate(3);
        return view('frontend.dokter',compact('dokter'));
    }

    public function cari(Request $request)
    {
        //Menangkap data pencarian
        // $cari = $request->cari;

        // //mengambul data dari tabel artikel sesuai pencarian data
        // $dokter = DB::table('dokter')
        // ->where('nama_dokter','like',"%".$cari."%")
        // ->paginate(2);

        // //mengirim data artikel ke view artikel
        // return view('frontend.dokter',compact('dokter'));

                //Menangkap data pencarian
                $cari = $request->cari;

                //mengambul data dari tabel artikel sesuai pencarian data
                // $dokter = DB::table('dokter')
                // ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_dokter')
                // ->where('nama_dokter','like',"%".$cari."%")
                // ->paginate(3);
                $kode = 11;
                $dokter = DB::table('dokter')
                    ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
                    ->where('nama_dokter','like',"%".$cari."%")
                    ->paginate(2);
                //mengirim data artikel ke view artikel
                return view('frontend.dokter',compact('dokter','kode'));
    }

    public function kategori(Request $request)
    {
        //Menangkap data pencarian
        // $cari = $request->cari;

        // //mengambul data dari tabel artikel sesuai pencarian data
        // $dokter = DB::table('dokter')
        // ->where('nama_dokter','like',"%".$cari."%")
        // ->paginate(2);

        // //mengirim data artikel ke view artikel
        // return view('frontend.dokter',compact('dokter'));

                //Menangkap data pencarian
                $kategori = $request->cari;

                //mengambul data dari tabel artikel sesuai pencarian data
                // $dokter = DB::table('dokter')
                // ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_dokter')
                // ->where('nama_dokter','like',"%".$cari."%")
                // ->paginate(3);
                $kode = 11;
                $dokter = DB::table('dokter')
                    ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
                    ->where('jabatan',$kategori)
                    ->paginate(4);
                //mengirim data artikel ke view artikel
                return view('frontend.dokter',compact('dokter','kode'));
                    
    }


    public function detail($id) {
        if(!Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        $dokter2 = DB::table('dokter')->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
        ->get();
        $dokter = DB::table('dokter')->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')->where('id_dokter',$id)->first();
        return view('frontend.detaildokter',compact('dokter','dokter2'));
    }

}
