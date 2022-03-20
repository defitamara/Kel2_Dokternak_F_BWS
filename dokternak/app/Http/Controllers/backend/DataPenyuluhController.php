<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Models\Dokter;
use App\Models\Penyuluh;
// use App\Models\jabatan;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class DataPenyuluhController extends Controller
{
    public function index()
    {
        $dtpenyuluh = DB::table('penyuluh')->get();
        return view('backend.penyuluh.index', compact('dtpenyuluh'));
    }

    public function cetak_pdf()
    {
        $dtpenyuluh = DB::table('penyuluh')->get();
    	$pdf = PDF::loadview('backend/penyuluh/cetak_pdf',['dtpenyuluh'=>$dtpenyuluh]);
    	return view ('backend.penyuluh.cetak_pdf',compact('dtpenyuluh'));
    }

    public function create()
    {
        return view('backend.penyuluh.create');
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
        // $id = 0;

        $getimageName = time().'.'.$request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('data/data_penyuluh'), $getimageName);


        $data_simpan = [
            
            'nama_penyuluh' => $request->nama,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'tempat' => $request->tempat,
            'telpon' => $request->telpon,
            'foto' => $getimageName,
            // 'id_jabatan' => $request->id_jabatan,
            'jadwal_kerja' => $request->jadwal_kerja,
            'verifikasi' => 'yes',
            'sertifikasi' => $request->sertifikasi,
            // 'username' => $request->username,
            // 'password' => Hash::make($request['password']),
        ];

        Penyuluh::create($data_simpan);

        return redirect()->route('dtpenyuluh.index')
                        ->with('success','Data penyuluh baru telah berhasil disimpan');

    }

    public function edit($id)
    {
        $dtpenyuluh = Penyuluh::where('id_penyuluh',$id)->first();
        return view('backend.penyuluh.create',compact('dtpenyuluh'));
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
            $request->foto->move(public_path('data/data_penyuluh'), $getimageName);
        }else {
            $getimageName = $gbr;
        }

        $data_simpan = [
            'nama_penyuluh' => $request->nama,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'tempat' => $request->tempat,
            'telpon' => $request->telpon,
            'foto' => $getimageName,
            // 'id_jabatan' => $request->id_jabatan,
            'jadwal_kerja' => $request->jadwal_kerja,
            'sertifikasi' => 'kosong',
            // 'username' => $request->username,
            // 'password' => Hash::make($request['password']),
        ];

        Penyuluh::where('id_penyuluh', $id)->update($data_simpan);

        return redirect()->route('dtpenyuluh.index')
                        ->with('success','Data penyuluh telah berhasil diperbarui');

    }

    public function detail($id)
    {
        $dtpenyuluh = Penyuluh::orderBy('id_penyuluh','asc')
                   ->where('id_penyuluh',$id)
                   ->get();
        return view('backend.penyuluh.detail',compact('dtpenyuluh'));
    }

    public function destroy($id)
    {
        $dtpenyuluh = Penyuluh::where('id_penyuluh',$id)->delete();
        return redirect()->route('dtpenyuluh.index')
                        ->with('success','Data penyuluh telah berhasil dihapus');
    }
}
