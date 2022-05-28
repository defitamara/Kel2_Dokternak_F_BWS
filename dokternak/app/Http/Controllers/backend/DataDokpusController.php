<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\dokter_puskeswan;
use App\Models\Puskeswan;
use App\Models\Dokter;
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
       
        $data_dokpus = DB::table('dokter_puskeswan')
            ->join('puskeswan', 'puskeswan.id_puskeswan','=','dokter_puskeswan.id_puskeswan')
            ->join('dokter','dokter.id_dokter','=','dokter_puskeswan.id_dokter')
            ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
            ->get();
            // ->where('puskeswan.nama_puskeswan','=','Puskeswan Curahdami')
        return view('backend.data_dokpus.index', compact('data_dokpus'));
    }

    public function cetak_pdf()
    {
        $data_dokpus = DB::table('dokter_puskeswan')
            ->join('puskeswan', 'puskeswan.id_puskeswan','=','dokter_puskeswan.id_puskeswan')
            ->join('dokter','dokter.id_dokter','=','dokter_puskeswan.id_dokter')
            ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
            ->get();
    	$pdf = PDF::loadview('backend/data_dokpus/cetak_pdf',['data_dokpus'=>$data_dokpus]);
    	return view('backend.data_dokpus.cetak_pdf',compact('data_dokpus'));
    }

    public function create()
    {
       
        $puskeswan = Puskeswan::all();
        $dokter = Dokter::all();
        return view('backend.data_dokpus.create',compact('puskeswan','dokter'));
    }

    public function store(Request $request)
    {

        $data_simpan = [
            
            'id_puskeswan' => $request->id_puskeswan,
            'id_dokter' => $request->id_dokter,
        ];

        dokter_puskeswan::create($data_simpan);

        return redirect()->route('data_dokpus.index')
                        ->with('success','Penambahan data petugas puskeswan baru telah berhasil disimpan');

    }

    public function edit($id)
    {
        
        $data_dokpus = DB::table('dokter_puskeswan')
            ->join('puskeswan', 'puskeswan.id_puskeswan','=','dokter_puskeswan.id_puskeswan')
            ->join('dokter','dokter.id_dokter','=','dokter_puskeswan.id_dokter')
            ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
            ->where('id_dp',$id)
            ->first();
        // $dtdokpus = dokter_puskeswan::where('id_dp',$id)->first();
        $puskeswan = Puskeswan::all();
        $dokter = Dokter::all();
        return view('backend.data_dokpus.create',compact('data_dokpus','puskeswan','dokter'));
    }

    public function update(Request $request, $id)
    {

        $data_simpan = [
            'id_puskeswan' => $request->id_puskeswan,
            'id_dokter' => $request->id_dokter,
        ];

        dokter_puskeswan::where('id_dp', $id)->update($data_simpan);

        return redirect()->route('data_dokpus.index')
                        ->with('success','Data petugas puskeswan telah berhasil diperbarui');

    }

    public function destroy($id)
    {
        $data_dokpus = dokter_puskeswan::where('id_dp',$id)->delete();
        return redirect()->route('data_dokpus.index')
                        ->with('success','Data petugas puskeswan telah berhasil dihapus');
    }
}
