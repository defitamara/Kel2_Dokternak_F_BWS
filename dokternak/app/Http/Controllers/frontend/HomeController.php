<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\artikel;
use App\Models\dokter;
use App\Models\penyuluh;
use App\Models\puskeswan;
use App\Models\tutorial;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $id = Auth::id();
        $user = User::where('id',$id)->first();

        $role = $user->is_admin;

        if ($role == 0) {
            $data = [
                'dokter' => DB::table('dokter')->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')->paginate(3, ['*'], 'dokter'),
                'pencarian_dokter' => DB::table('dokter')->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')->get(),
                'artikel' => DB::table('artikel')->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'artikel.id_ktg')
                ->orderBy('id_artikel','desc')
                ->where('status','=','tampil')
                ->paginate(2, ['*'], 'artikel'),
                  'tutorial' => Tutorial::orderBy('judul_tutorial', 'desc')->paginate(4, ['*'], 'tutorial'),
                  'penyuluh' => penyuluh::orderBy('nama_penyuluh', 'desc')->paginate(4, ['*'], 'penyuluh'),
                  
              ];
              return view('frontend.home',compact('data'));
        }
        elseif ($role  == 2) {
            return redirect()->route('lppetugas');
        }elseif($role  == 1) {
            return redirect()->route('dashboard');
        }
        

    }

    public function cari(Request $request)
    {

        //Menangkap data pencarian
        $cari = $request->cari_petugas;
        $kategori = $request->kategori_kecamatan;

        $kode = 11;

        //mengambil data dari tabel dokter sesuai pencarian data
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
            //penyuluh::orderBy('id_penyuluh')->paginate(3),
        ];

        //mengirim data artikel ke view dokter
        return view('frontend.home',compact('data','kode'));
    }

    public function detail($id) {
        $tutorial = DB::table('tutorial')->where('id_tutorial',$id)->first();
        return view('frontend.detailtutorial',compact('tutorial'));
    }
}
