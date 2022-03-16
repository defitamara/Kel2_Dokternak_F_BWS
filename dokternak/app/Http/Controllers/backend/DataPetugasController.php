<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\controller;
use App\Models\DokterUser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Models\Petugas;
use App\Models\Role;
use Barryvdh\DomPDF\Facade as PDF;

class DataPetugasController extends Controller
{
    public function index()
    {

        $data = DokterUser::select('dokter.*', 'users.*')
            ->join('users', 'users.id', '=', 'dokter.id') 
            ->where('dokter.id','!=',0)
            ->get();

        return view('backend.datapetugas.index',compact('data'));
    }

    public function cetak_pdf()
    {
        $dtdokter = DB::table('dokter')->get();
    	$pdf = PDF::loadview('backend/dokter/cetak_pdf',['dtdokter'=>$dtdokter]);
    	return view ('backend.dokter.cetak_pdf',compact('dtdokter'));
    }

    public function create()
    {
        // $role =  Role::where('id_role',2)->first();

        //$datapetugas = null;
        $petugas = DokterUser::select('dokter.*')
            ->where('id',0)
            ->get();
        //return $datapetugas;
        return view('backend.datapetugas.buat',compact('petugas'));
    }

    public function store(Request $request)
    {

        $nama = $request->nama_dokter;  

        $role = 2;
        $user = User::create([
            'name' =>$nama,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $role,

        ]);

        $id_user = $user->id;
        $emailptr = $user->email;

        $message = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal 15 huruf!!!',
            'max' => ':attribute URL harus diisi maksimal 100 huruf!!!',
            'mimes' => ':attribute harus berupa gambar dengan format (JPEG, PNG, dan SVG)',
        ];

        $validator = FacadesValidator::make($request->all(),[
            'email' => 'required|string|max:40',
        ], $message)->validate();

        $status= "tampil";

        $data_simpan = [
            'id' => $id_user,
            'email' => $emailptr,
        ];

        DokterUser::where('nama_dokter', $nama)->update($data_simpan);

        return redirect()->route('datapetugas.index')
                        ->with('success','Data petugas baru telah berhasil disimpan');
    }

    public function edit($id)
    {
        $datapetugas = DokterUser::select('dokter.*','users.*')
        ->join('users', 'users.id', '=', 'dokter.id') 
        ->where('id_dokter', $id)->first();
        $petugas = DokterUser::select('dokter.*')
            ->where('id','!=',0)
            ->get();
        return view('backend.datapetugas.create',compact('datapetugas','petugas'));
    }

    public function update(Request $request, $id)
    {
        $message = [
            'numeric' => ':attributer harus diisi nomor.'
        ];

        $validator = FacadesValidator::make($request->all(),[
        ], $message)->validate();

        $status= "tampil";


        $gbr=$request->nama_gambar;
        
        if($request->has('foto_peternak')) {
            $getimageName = time().'.'.$request->foto_peternak->getClientOriginalExtension();
            $request->foto_peternak->move(public_path('data/data_peternak'), $getimageName);
        }else {
            $getimageName = $gbr;
        }

        $data_simpan = [
            'id' => $id_user,
            'email' => $emailptr,
        ];

        DokterUser::where('id_dokter', $id)->update($data_simpan);

        return redirect()->route('datapetugas.index')
                        ->with('success','Data Petugas telah berhasil diperbarui');
    }

    public function destroy($id)
    {
        $admin = User::where('id',$id)->delete();
        $petugasuser= DokterUser::where('id',$id)->delete();
        return redirect()->route('datapetugas.index')
                        ->with('success','Data Petugas telah berhasil dihapus');
    }
}