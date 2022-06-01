<?php

namespace App\Http\Controllers\staf;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\dokter_puskeswan;
use App\Models\Puskeswan;
use App\Models\dokter;
use App\Models\jabatan;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class DataDokpusController extends Controller
{
    public function index()
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        $dtdokpus = DB::table('dokter_puskeswan')
            ->join('puskeswan', 'puskeswan.id_puskeswan','=','dokter_puskeswan.id_puskeswan')
            ->join('dokter','dokter.id_dokter','=','dokter_puskeswan.id_dokter')
            ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
            ->get();
            // ->where('puskeswan.nama_puskeswan','=','Puskeswan Curahdami')
        return view('staf.dt_dokpus.index', compact('dtdokpus','staf'));
    }

    public function cetak_pdf()
    {
        $dtdokpus = DB::table('dokter_puskeswan')
            ->join('puskeswan', 'puskeswan.id_puskeswan','=','dokter_puskeswan.id_puskeswan')
            ->join('dokter','dokter.id_dokter','=','dokter_puskeswan.id_dokter')
            ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
            ->get();
    	$pdf = PDF::loadview('staf/dt_dokpus/cetak_pdf',['dtdokpus'=>$dtdokpus]);
    	return view('staf.dt_dokpus.cetak_pdf',compact('dtdokpus'));
    }

    public function create()
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        $puskeswan = Puskeswan::all();
        $dokter = Dokter::all();
        return view('staf.dt_dokpus.create',compact('puskeswan','dokter','staf'));
    }

    public function store(Request $request)
    {

        $data_simpan = [
            
            'id_puskeswan' => $request->id_puskeswan,
            'id_dokter' => $request->id_dokter,
        ];

        dokter_puskeswan::create($data_simpan);

        return redirect()->route('dt_dokpus.index')
                        ->with('success','Penambahan data petugas puskeswan baru telah berhasil disimpan');

    }

    public function edit($id)
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        $dtdokpus = DB::table('dokter_puskeswan')
            ->join('puskeswan', 'puskeswan.id_puskeswan','=','dokter_puskeswan.id_puskeswan')
            ->join('dokter','dokter.id_dokter','=','dokter_puskeswan.id_dokter')
            ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
            ->where('id_dp',$id)
            ->first();
        // $dtdokpus = dokter_puskeswan::where('id_dp',$id)->first();
        $puskeswan = Puskeswan::all();
        $dokter = Dokter::all();
        return view('staf.dt_dokpus.create',compact('dtdokpus','puskeswan','dokter','staf'));
    }

    public function update(Request $request, $id)
    {

        $data_simpan = [
            'id_puskeswan' => $request->id_puskeswan,
            'id_dokter' => $request->id_dokter,
        ];

        dokter_puskeswan::where('id_dp', $id)->update($data_simpan);

        return redirect()->route('dt_dokpus.index')
                        ->with('success','Data petugas puskeswan telah berhasil diperbarui');

    }

    public function destroy($id)
    {
        $dtdokpus = dokter_puskeswan::where('id_dp',$id)->delete();
        return redirect()->route('dt_dokpus.index')
                        ->with('success','Data petugas puskeswan telah berhasil dihapus');
    }
}
