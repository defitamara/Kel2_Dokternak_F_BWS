<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\artikel;
use App\Models\dokter;
use App\Models\puskeswan;
use App\Models\penyuluh;
use App\Models\tutorial;


class WelcomeController extends Controller
{
    public function index()
    {
        $data = [
            'artikel' => DB::table('artikel')->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'artikel.id_ktg')->paginate(2, ['*'], 'artikel'),
            'pencarian_dokter' => DB::table('dokter')->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')->get(),
            'tutorial' => Tutorial::orderBy('id_tutorial')->paginate(4, ['*'], 'tutorial'),
            'dokter' => DB::table('dokter')->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')->paginate(3, ['*'], 'dokter'),
            'penyuluh' => penyuluh::orderBy('id_penyuluh')->paginate(3),
        ];
        return view('welcome',compact('data'));
        // return view('frontend.home');
    }

    public function cari(Request $request)

    {



        //Menangkap data pencarian

        $cari = $request->cari_petugas;

        $kategori = $request->kategori_kecamatan;



        $kode = 11;



        //mengambul data dari tabel dokter sesuai pencarian data

        $data = [

            'dokter' => DB::table('dokter')

            ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')

            ->where('tempat', 'LIKE', '%' . $kategori . '%')

            ->where('nama_dokter','like',"%".$cari."%")

            ->paginate(3),

            'pencarian_dokter' => DB::table('dokter')->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')->get(),

            'artikel' => DB::table('artikel')->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'artikel.id_ktg')

            ->orderBy('id_artikel','desc')

            ->where('status','=','tampil')

            ->paginate(2),

            'tutorial' => Tutorial::orderBy('id_tutorial')->paginate(3),
            'penyuluh' => DB::table('penyuluh')
            ->where('tempat', 'LIKE', '%' . $kategori . '%')
            ->where('nama_penyuluh', 'LIKE', "%" .$cari. "%")
            ->paginate(3),

        ];



        //mengirim data artikel ke view dokter

        return view('welcome',compact('data','kode'));

    }
}
