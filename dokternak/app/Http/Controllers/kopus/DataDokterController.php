<?php

namespace App\Http\Controllers\kopus;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\dokter;
use App\Models\jabatan;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class DataDokterController extends Controller
{
    public function index()
    {
        $kopus = DB::table('users')
            ->join('koordinator_puskeswan','koordinator_puskeswan.id','=','users.id')
            ->join('puskeswan','puskeswan.id_puskeswan','=','koordinator_puskeswan.id_puskeswan')
            ->get();
        $dtdokter = DB::table('dokter')
            ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
            ->get();
        return view('kopus.tabel_dokter.index', compact('dtdokter','kopus'));
    }

    public function cetak_pdf()
    {
        $dtdokter = DB::table('dokter')
                ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
                ->get();
    	$pdf = PDF::loadview('kopus/tabel_dokter/cetak_pdf',['dtdokter'=>$dtdokter]);
    	return view('kopus.tabel_dokter.cetak_pdf',compact('dtdokter'));
    }

    public function edit($id)
    {
        $kopus = DB::table('users')
            ->join('koordinator_puskeswan','koordinator_puskeswan.id','=','users.id')
            ->join('puskeswan','puskeswan.id_puskeswan','=','koordinator_puskeswan.id_puskeswan')
            ->get();
        $dtdokter = dokter::where('id_dokter',$id)->first();
        $jabatan = jabatan::all();
        return view('kopus.tabel_dokter.edit',compact('dtdokter','jabatan','kopus'));
    }

    public function update(Request $request, $id)
    {
        $message = [
            'numeric' => ':attributer harus diisi nomor.'
        ];

        $validator = FacadesValidator::make($request->all(),[
            // 'nama' => 'required|string|max:100',
            // 'tingkatan' => 'required|numeric',
        ], $message)->validate();

        $gbr=$request->nama_gambar;
        
        if($request->has('foto')) {
            $getimageName = time().'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('data/data_dokter'), $getimageName);
        }else {
            $getimageName = $gbr;
        }

        $data_simpan = [
            'nama_dokter' => $request->nama,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'tempat' => $request->tempat,
            'telpon' => $request->telpon,
            'foto' => $getimageName,
            'id_jabatan' => $request->id_jabatan,
            'jadwal_kerja' => $request->jadwal_kerja,
            'sertifikasi' => 'kosong',
        ];

        dokter::where('id_dokter', $id)->update($data_simpan);

        // Request id, agar bisa melakukan update nama dan email di tabel users sesuai id
        $id_user = $request->id;

        if($id_user != 0)
        {
            $data_simpan2 = [
                'name' => $request->nama,
                'email' => $request->email,
            ];
    
            User::where('id', $id_user)->update($data_simpan2);

            return redirect()->route('tabel_dokter.index')
                ->with('success','Data petugas dan akun petugas telah berhasil diperbarui');

        }else{
            return redirect()->route('tabel_dokter.index')
                ->with('success','Data petugas telah berhasil diperbarui');
        }

    }

    public function detail($id)
    {
        $kopus = DB::table('users')
            ->join('koordinator_puskeswan','koordinator_puskeswan.id','=','users.id')
            ->join('puskeswan','puskeswan.id_puskeswan','=','koordinator_puskeswan.id_puskeswan')
            ->get();
        $dtdokter = dokter::join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
                   ->orderBy('id_dokter','asc')
                   ->where('id_dokter',$id)
                   ->get();
        return view('kopus.tabel_dokter.detail',compact('dtdokter','kopus'));
    }

}
