<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Artikel;
use App\Models\Dokter;
use App\Models\Puskeswan;
use App\Models\tutorial;
use App\Models\jabatan;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Staf_it;
use App\Models\KoordinatorPuskeswan;
use App\Models\penyuluh;
use App\Models\DokterUser;
use App\Models\informasi;


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
        }elseif($role == 3) {
            return redirect()->route('dbstaf');
        }elseif ($role  == 4) {
            return redirect()->route('dbkopus');
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
        }elseif($role == 3) {
            return redirect()->route('dbstaf');
        }elseif ($role  == 4) {
            return redirect()->route('dbkopus');
        }elseif($role  == 0) {
            return redirect()->route('home');
        }
    }

    // Dashboard Staf IT
    public function dbstaf()
    {
        $id = Auth::id();
        $user = User::where('id',$id)->first();

        $role = $user->is_admin;

        if ($role == 3) {
            $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();

            // Hitung jumlah data 
            $count_artikel = Artikel::count();
            $count_petugas = Dokter::count();
            $count_staf = Staf_it::count();
            $count_kopus = KoordinatorPuskeswan::count();
            $count_py = Penyuluh::count();
            $count_pus = puskeswan::count();
            $c_userpetugas = DokterUser::select('dokter.*', 'users.*')
            ->join('users', 'users.id', '=', 'dokter.id') 
            ->where('dokter.id','!=',0)
            ->count();
            $c_userstaf = User::where('is_admin',3)->count();
            $c_userkopus = User::where('is_admin',4)->count();
            $c_informasi = informasi::count();

            return view('staf.dashboard',compact('staf','count_artikel','count_petugas','count_staf',
            'count_kopus','count_py','count_pus','c_userpetugas','c_userstaf','c_userkopus','c_informasi'));
        }
        elseif ($role  == 4) {
            return redirect()->route('dbkopus');
        }elseif ($role  == 2) {
            return redirect()->route('lppetugas');
        }elseif($role == 1) {
            return redirect()->route('dashboard');
        }elseif($role  == 0) {
            return redirect()->route('home');
        }
    }

    // Dashboard Koordinator Puskeswan
    public function dbkopus()
    {
        $id = Auth::id();
        $user = User::where('id',$id)->first();

        $role = $user->is_admin;

        if ($role == 4) {
            $kopus = DB::table('users')
            ->join('koordinator_puskeswan','koordinator_puskeswan.id','=','users.id')
            ->join('puskeswan','puskeswan.id_puskeswan','=','koordinator_puskeswan.id_puskeswan')
            ->get();
            $petugas_pus = DB::table('users')
            ->join('koordinator_puskeswan','koordinator_puskeswan.id','=','users.id')
            ->join('puskeswan','puskeswan.id_puskeswan','=','koordinator_puskeswan.id_puskeswan')
            ->join('dokter_puskeswan','dokter_puskeswan.id_puskeswan','=','puskeswan.id_puskeswan')
            ->join('dokter','dokter.id_dokter','=','dokter_puskeswan.id_dokter')
            ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
            ->where('users.id','=',$id)
            ->count();
            $count_petugas = Dokter::count();
            return view('kopus.dashboard',compact('kopus','petugas_pus','count_petugas'));
        }
        elseif ($role  == 3) {
            return redirect()->route('dbstaf');
        }elseif ($role  == 2) {
            return redirect()->route('lppetugas');
        }elseif($role == 1) {
            return redirect()->route('dashboard');
        }elseif($role  == 0) {
            return redirect()->route('home');
        }
    }

    // Landing Page Penyuluh Gajadi
    // public function lppenyuluh()
    // {
    //     // Komentarin dulu karena authnya belum diatur
    //     // $id = Auth::id();
    //     // $user = User::where('id',$id)->first();

    //     // $role = $user->is_admin;

    //     // Auth manual buat liat tampilan tapi gagal
    //     // $id = 33;
    //     // $user = User::where('id',$id)->first();
    //     // $role = 3;

    //     if ($role == 3) {
    //         $penyuluh = DB::table('users')->join('penyuluh','penyuluh.id','=','users.id')
    //         ->get();
    //         $data = [
    //             'artikel' => DB::table('artikel')->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'artikel.id_ktg')
    //             ->orderBy('id_artikel','desc')
    //             ->where('status','=','tampil')
    //             ->paginate(2),
    //         ];
    //         return view('penyuluh.home',compact('data','penyuluh'));
    //     }elseif ($role  == 2) {
    //         return redirect()->route('lppetugas');
    //     }elseif ($role  == 1) {
    //         return redirect()->route('dashboard');
    //     }elseif($role  == 0) {
    //         return redirect()->route('home');
    //     }
    // }
}
