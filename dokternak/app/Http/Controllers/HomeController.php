<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Artikel;
use App\Models\dokter;
use App\Models\puskeswan;
use App\Models\tutorial;
use App\Models\jabatan;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); //jika mau liat tampilan /penyuluh/artikel dll, komentarin ini
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'dokter' => DB::table('dokter')->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')->paginate(3),
            'artikel' => Artikel::orderBy('tanggal', 'desc')->paginate(2),
            'dokter' => DB::table('dokter')->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')->paginate(3),
        ];
        return view('frontend.home',compact('data'));
        // return view('frontend.home');
    }

    public function dashboard()
    {
        $id = Auth::id();
        $user = User::where('id',$id)->first();

        $role = $user->is_admin;

        if ($role == 1) {
            return view('backend.dashboard');
        }
        elseif ($role  == 2) {
            return redirect()->route('lppetugas');
        }elseif($role  == 0) {
            return redirect()->route('home');
        }
    }

    public function lppetugas()
    {
        // $data = [
        //     'artikel' => Artikel::orderBy('tanggal', 'desc')->paginate(2),
        // ];
        // return view('petugas.home',compact('data'));
        // $id_petugas = Auth::user()->id;
        
        $id = Auth::id();
        $user = User::where('id',$id)->first();

        $role = $user->is_admin;

        if ($role == 2) {
            $petugas = DB::table('users')->join('dokter','dokter.id','=','users.id')
            ->join('jabatan','jabatan.id_jabatan','=','dokter.id_jabatan')
            ->get();
            $data = [
                'artikel' => DB::table('artikel')->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'artikel.id_ktg')
                ->orderBy('id_artikel','desc')
                ->where('status','=','tampil')
                ->paginate(2),
            ];
            return view('petugas.home',compact('data','petugas'));
        }
        elseif ($role  == 1) {
            return redirect()->route('dashboard');
        }elseif($role  == 0) {
            return redirect()->route('home');
        }
    }

    // Landing Page Penyuluh
    public function lppenyuluh()
    {
        // Komentarin dulu karena authnya belum diatur
        // $id = Auth::id();
        // $user = User::where('id',$id)->first();

        // $role = $user->is_admin;

        // Auth manual buat liat tampilan tapi gagal
        // $id = 33;
        // $user = User::where('id',$id)->first();
        // $role = 3;

        if ($role == 3) {
            $penyuluh = DB::table('users')->join('penyuluh','penyuluh.id','=','users.id')
            ->get();
            $data = [
                'artikel' => DB::table('artikel')->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'artikel.id_ktg')
                ->orderBy('id_artikel','desc')
                ->where('status','=','tampil')
                ->paginate(2),
            ];
            return view('penyuluh.home',compact('data','penyuluh'));
        }elseif ($role  == 2) {
            return redirect()->route('lppetugas');
        }elseif ($role  == 1) {
            return redirect()->route('dashboard');
        }elseif($role  == 0) {
            return redirect()->route('home');
        }
    }
}
