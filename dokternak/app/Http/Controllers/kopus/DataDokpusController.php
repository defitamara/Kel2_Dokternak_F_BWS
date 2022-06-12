<?php

namespace App\Http\Controllers\kopus;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\dokter_puskeswan;
use App\Models\Puskeswan;
use App\Models\dokter;
use App\Models\jabatan;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Facades\Auth;


class DataDokpusController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $id = Auth::id();
        $user = User::where('id',$id)->first();

        $kopus = DB::table('users')
            ->join('koordinator_puskeswan','koordinator_puskeswan.id','=','users.id')
            ->join('puskeswan','puskeswan.id_puskeswan','=','koordinator_puskeswan.id_puskeswan')
            ->get();

        $dtdokpus = DB::table('users')
            ->join('koordinator_puskeswan','koordinator_puskeswan.id','=','users.id')
            ->join('puskeswan','puskeswan.id_puskeswan','=','koordinator_puskeswan.id_puskeswan')
            ->join('dokter_puskeswan','dokter_puskeswan.id_puskeswan','=','puskeswan.id_puskeswan')
            ->join('dokter','dokter.id_dokter','=','dokter_puskeswan.id_dokter')
            ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
            ->where('users.id','=',$id)
            ->get();

        return view('kopus.tabel_dokpus.index', compact('dtdokpus','kopus'));
    }

    public function cetak_pdf()
    {
        $dtdokpus = DB::table('users')
            ->join('koordinator_puskeswan','koordinator_puskeswan.id','=','users.id')
            ->join('puskeswan','puskeswan.id_puskeswan','=','koordinator_puskeswan.id_puskeswan')
            ->join('dokter_puskeswan','dokter_puskeswan.id_puskeswan','=','puskeswan.id_puskeswan')
            ->join('dokter','dokter.id_dokter','=','dokter_puskeswan.id_dokter')
            ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
            ->get();
    	$pdf = PDF::loadview('kopus/tabel_dokpus/cetak_pdf',['dtdokpus'=>$dtdokpus]);
    	return view('kopus.tabel_dokpus.cetak_pdf',compact('dtdokpus'));
    }

    public function create()
    {
        $id = Auth::id();

        $kopus = DB::table('users')
            ->join('koordinator_puskeswan','koordinator_puskeswan.id','=','users.id')
            ->join('puskeswan','puskeswan.id_puskeswan','=','koordinator_puskeswan.id_puskeswan')
            ->get();
        $puskeswan = DB::table('puskeswan')
        ->join('koordinator_puskeswan','koordinator_puskeswan.id_puskeswan','=','puskeswan.id_puskeswan')
        ->join('users','users.id','=','koordinator_puskeswan.id')
        ->where('users.id','=',$id)
        ->get();
        $dokter = Dokter::all();
        return view('kopus.tabel_dokpus.create',compact('puskeswan','dokter','kopus'));
    }

    public function store(Request $request)
    {

        $data_simpan = [
            
            'id_puskeswan' => $request->id_puskeswan,
            'id_dokter' => $request->id_dokter,
        ];

        dokter_puskeswan::create($data_simpan);

        return redirect()->route('tabel_dokpus.index')
                        ->with('success','Penambahan data petugas puskeswan baru telah berhasil disimpan');

    }

    public function edit($id)
    {
        $id = Auth::id();

        $kopus = DB::table('users')
            ->join('koordinator_puskeswan','koordinator_puskeswan.id','=','users.id')
            ->join('puskeswan','puskeswan.id_puskeswan','=','koordinator_puskeswan.id_puskeswan')
            ->get();
        $dtdokpus = DB::table('users')
            ->join('koordinator_puskeswan','koordinator_puskeswan.id','=','users.id')
            ->join('puskeswan','puskeswan.id_puskeswan','=','koordinator_puskeswan.id_puskeswan')
            ->join('dokter_puskeswan','dokter_puskeswan.id_puskeswan','=','puskeswan.id_puskeswan')
            ->join('dokter','dokter.id_dokter','=','dokter_puskeswan.id_dokter')
            ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
            ->where('id_dp',$id)
            ->first();
        // $dtdokpus = DB::table('dokter_puskeswan')
        //     ->join('puskeswan', 'puskeswan.id_puskeswan','=','dokter_puskeswan.id_puskeswan')
        //     ->join('dokter','dokter.id_dokter','=','dokter_puskeswan.id_dokter')
        //     ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
        //     ->where('id_dp',$id)
        //     ->first();
        // $dtdokpus = dokter_puskeswan::where('id_dp',$id)->first();
        $puskeswan = DB::table('puskeswan')
        ->join('koordinator_puskeswan','koordinator_puskeswan.id_puskeswan','=','puskeswan.id_puskeswan')
        ->join('users','users.id','=','koordinator_puskeswan.id')
        ->where('users.id','=',$id)
        ->get();
        $dokter = dokter::all();
        return view('kopus.tabel_dokpus.create',compact('dtdokpus','puskeswan','dokter','kopus'));
    }

    public function update(Request $request, $id)
    {

        $data_simpan = [
            'id_puskeswan' => $request->id_puskeswan,
            'id_dokter' => $request->id_dokter,
        ];

        dokter_puskeswan::where('id_dp', $id)->update($data_simpan);

        return redirect()->route('tabel_dokpus.index')
                        ->with('success','Data petugas puskeswan telah berhasil diperbarui');

    }

    public function destroy($id)
    {
        $dtdokpus = dokter_puskeswan::where('id_dp',$id)->delete();
        return redirect()->route('tabel_dokpus.index')
                        ->with('success','Data petugas puskeswan telah berhasil dihapus');
    }
}
