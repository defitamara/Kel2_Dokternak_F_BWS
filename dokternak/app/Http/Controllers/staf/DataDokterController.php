<?php

namespace App\Http\Controllers\staf;

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
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        $dtdokter = DB::table('dokter')
            ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
            ->get();
        return view('staf.dt_dokter.index', compact('dtdokter','staf'));
    }

    public function cetak_pdf()
    {
        $dtdokter = DB::table('dokter')
                ->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
                ->get();
    	$pdf = PDF::loadview('staf/dt_dokter/cetak_pdf',['dtdokter'=>$dtdokter]);
    	return view('staf.dt_dokter.cetak_pdf',compact('dtdokter'));
    }

    public function create()
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        $jabatan = Jabatan::all();
        return view('staf.dt_dokter.create',compact('jabatan','staf'));
    }

    public function store(Request $request)
    {

        $message = [
            'numeric' => ':attributer harus diisi nomor.'
        ];

        $validator = FacadesValidator::make($request->all(),[
            // 'nama' => 'required|string|max:100',
            // 'tingkatan' => 'required|numeric',
        ], $message)->validate();

        $role = 1;
        $id = 0;

        $getimageName = time().'.'.$request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('data/data_dokter'), $getimageName);


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
            'id' => $id,
            'verifikasi' => 'yes',
            'sertifikasi' => $request->sertifikasi,
        ];

        dokter::create($data_simpan);

        return redirect()->route('dt_dokter.index')
                        ->with('success','Data petugas baru telah berhasil disimpan');

    }

    public function edit($id)
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        $dtdokter = Dokter::where('id_dokter',$id)->first();
        $jabatan = Jabatan::all();
        return view('staf.dt_dokter.create',compact('dtdokter','jabatan','staf'));
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

        Dokter::where('id_dokter', $id)->update($data_simpan);

        // Request id, agar bisa melakukan update nama dan email di tabel users sesuai id
        $id_user = $request->id;

        if($id_user != 0)
        {
            $data_simpan2 = [
                'name' => $request->nama,
                'email' => $request->email,
            ];
    
            User::where('id', $id_user)->update($data_simpan2);

            return redirect()->route('dt_dokter.index')
                ->with('success','Data petugas dan akun petugas telah berhasil diperbarui');

        }else{
            return redirect()->route('dt_dokter.index')
                ->with('success','Data petugas telah berhasil diperbarui');
        }

    }

    public function detail($id)
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        $dtdokter = Dokter::join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')
                   ->orderBy('id_dokter','asc')
                   ->where('id_dokter',$id)
                   ->get();
        return view('staf.dt_dokter.detail',compact('dtdokter','staf'));
    }

    public function destroy($id)
    {
        $dtdokter = Dokter::where('id_dokter',$id)->delete();
        return redirect()->route('dt_dokter.index')
                        ->with('success','Data petugas telah berhasil dihapus');
    }
}
