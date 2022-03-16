<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\rekam_medik;
use App\Models\Artikel;
use App\Models\dokter;
use App\Models\dokter_rekammedik;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class RekammedikController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $rekam_medik = DB::table('rekam_medik')->get();
        $rekam_medik = rekam_medik::join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'rekam_medik.id_ktg')
                    ->join('kategori_hewan', 'kategori_hewan.id_kategori','=','rekam_medik.id_kategori')
                    ->orderBy('id_rmd','desc')
                    ->get();
        $rmd_petugas = DB::table('users')->join('dokter','dokter.id','=','users.id')
                    ->join('dokter_rekammedik','dokter_rekammedik.id_dokter','=','dokter.id_dokter')
                    ->join('rekam_medik','rekam_medik.id_rmd','=','dokter_rekammedik.id_rmd')
                    ->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'rekam_medik.id_ktg')
                    ->join('kategori_hewan', 'kategori_hewan.id_kategori','=','rekam_medik.id_kategori')
                    ->paginate(5);
        $kategori_artikel = DB::table('kategori_artikel')->orderBy('id_ktg','desc')->get();
        return view('petugas.rekam_medik.index', compact('rekam_medik','rmd_petugas','kategori_artikel'));
    }

    public function create()
    {
        $rekam_medik = null;
        return view('petugas.rekam_medik.index',compact('rekam_medik'));
    }

    public function store(Request $request)
    {
        $id = Auth::id();
        $petugas = DB::table('dokter')->where('id',$id)->first();
        $id_dokter = $petugas->id_dokter;

        $message = [
            'numeric' => ':attribute harus diisi nomor.'
        ];

        $validator = FacadesValidator::make($request->all(),[
            // 'nama' => 'required|string|max:100',
            // 'tingkatan' => 'required|numeric',
        ], $message)->validate();

        $kode = date('yHi'); //tahun,jam,menit
        // $id_rmd= "RMD$kode";

        $data_simpan = [
            'id_rmd' => $kode,
            'tanggal' => $request->tanggal,
            'id_kategori' => $request->id_kategori, 
            'id_ktg' => $request->id_ktg, 
            'nama_hewan' => $request->nama_hewan, 
            'nama_peternak' => $request->nama_peternak,
            'alamat' => $request->alamat,
            'keluhan' => $request->keluhan,
            'diagnosa' => $request->diagnosa,
            'pelayanan' => $request->pelayanan,
        ];
        
        $data_simpan2 = [
            'id_dokmed' => "",
            'id_rmd' => $kode,
            'id_dokter' =>$id_dokter,
        ];

        rekam_medik::create($data_simpan);
        dokter_rekammedik::create($data_simpan2);

        return redirect()->back()->with('success','Data Rekam Medik baru telah berhasil disimpan');
    }

    public function edit(Request $request, $id_rmd)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            rekam_medik::where(['id_rmd'=>$id_rmd])->update(['tanggal'=>$data['tanggal'], 
            'id_kategori'=>$data['id_kategori'],
            'id_ktg'=>$data['id_ktg'],
            'nama_hewan'=>$data['nama_hewan'],
            'nama_peternak' =>$data['nama_peternak'],
            'alamat'=>$data['alamat'],
            'keluhan'=>$data['keluhan'],
            'diagnosa'=>$data['diagnosa'],
            'pelayanan'=>$data['pelayanan']]);

            return redirect()->back()->with('success','Data Rekam Medik telah berhasil diperbarui');
        }

    
    }

    public function delete($id_rmd)
    {
        rekam_medik::where(['id_rmd'=>$id_rmd])->delete();
        return redirect()->back()->with('success','Data rekam medik telah berhasil dihapus');
    }

    public function cetakrmd()
    {
        $id = Auth::id();
        $petugas = DB::table('dokter')->where('id',$id)->first();
        $id_dokter = $petugas->id_dokter;

        $rekam_medik = rekam_medik::join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'rekam_medik.id_ktg')
                    ->join('kategori_hewan', 'kategori_hewan.id_kategori','=','rekam_medik.id_kategori')
                    ->join('dokter_rekammedik','dokter_rekammedik.id_rmd','=','rekam_medik.id_rmd')
                    ->join('dokter','dokter.id_dokter','=','dokter_rekammedik.id_dokter')
                    ->where('dokter_rekammedik.id_dokter',$id_dokter)
                    ->orderBy('rekam_medik.id_rmd','desc')
                    ->get();

        $pdf = PDF::loadview('petugas/rekam_medik/cetak_pdf',['rekam_medik'=>$rekam_medik]);
        return view('petugas.rekam_medik.cetak_pdf', compact('rekam_medik'));
    }

}

