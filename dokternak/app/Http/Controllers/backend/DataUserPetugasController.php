<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Models\DokterUser;
use App\Models\Role;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;

class DataUserPetugasController extends Controller
{
    public function index()
    {
        $data = DokterUser::select('dokter.*', 'users.*')
            ->join('users', 'users.id', '=', 'dokter.id') 
            ->where('dokter.id','!=',0)
            ->get();

        return view('backend.data_user_petugas.index',compact('data'));
    }

    public function cetak_pdf()
    {
        $data_petugas = DokterUser::select('dokter.*', 'users.*')
            ->join('users', 'users.id', '=', 'dokter.id') 
            ->where('dokter.id','!=',0)
            ->get();
    	$pdf = PDF::loadview('backend/data_user_petugas/cetak_pdf',['data_petugas'=>$data_petugas]);
    	return view('backend.data_user_petugas.cetak_pdf',compact('data_petugas'));
    }

    public function create()
    {


        $data_petugas = DokterUser::select('dokter.*')
            ->where('id',0)
            ->get();

        return view('backend.data_user_petugas.create',compact('data_petugas'));
    }

    public function store(Request $request)
    {

        $nama = $request->nama_dokter;  

        $role = 3;
        $user = User::create([
            'name' =>$nama,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $role,

        ]);

        $id_user = $user->id;

        $message = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal 15 huruf!!!',
            'max' => ':attribute URL harus diisi maksimal 100 huruf!!!',
            'mimes' => ':attribute harus berupa gambar dengan format (JPEG, PNG, dan SVG)',
        ];

        $validator = FacadesValidator::make($request->all(),[
            'email' => 'required|string|max:40',
        ], $message)->validate();


        $data_simpan = [
            'id' => $id_user,
        ];

        DokterUser::where('nama_dokter', $nama)->update($data_simpan);

        return redirect()->route('data_user_petugas.index')
                        ->with('success','Data petugas baru telah berhasil disimpan');
    }


    public function edit($id)
    {

        $data = DokterUser::select('dokter.*','users.*')
        ->join('users', 'users.id', '=', 'dokter.id') 
        ->where('dokter.id', $id)->first();

        $dokter = DokterUser::select('dokter.*')
            ->where('id','!=',0)
            ->get();
        
        $petugas = DB::table('users')->join('dokter','dokter.id','=','users.id')
            ->get();
        return view('backend.data_user_petugas.edit',compact('data','dokter'));
    }

    public function update(Request $request, $id)
    { 

        $message = [
            'numeric' => ':attributer harus diisi nomor.'
        ];

        $validator = FacadesValidator::make($request->all(),[
            'email' => 'required|string|max:40',
        ], $message)->validate();

        $data_update = [
            'email' => $request->email,
        ];

        User::where('id', $id)->update($data_update);


        return redirect()->route('data_user_petugas.index')
                        ->with('success','Data petugas telah berhasil diperbarui');
    }

    public function ubahpw($id)
    {
        $data = DokterUser::select('dokter.*','users.*')
        ->join('users', 'users.id', '=', 'dokter.id') 
        ->where('dokter.id', $id)->first();
        
        $petugas = DB::table('users')->join('dokter','dokter.id','=','users.id')
            ->get();
        
        return view('backend.data_user_petugas.ubahpw',compact('data'));
    }

    public function ubahpassword(Request $request, $id)
    {
        $message = [
            'numeric' => ':attributer harus diisi nomor.'
        ];

        $validator = FacadesValidator::make($request->all(),[
            'password' => 'required|string|max:40',
        ], $message)->validate();

        $data_update = [
            'password' => Hash::make($request->input('password')),
        ];

        User::where('id', $id)->update($data_update);

        return redirect()->route('data_user_petugas.index')
                        ->with('success','Password Akun petugas telah berhasil diperbarui');
    }

    public function destroy($id)
    {
        $admin = User::where('id',$id)->delete();

        // Mengubah id di data petugas menjadi 0, artinya tidak punya akun
        $hapusId = 0;
        $data_simpan = [
            'id' => $hapusId,
        ];

        DokterUser::where('id', $id)->update($data_simpan);

        // $petugasuser= DokterUser::where('id',$id)->delete();
        return redirect()->route('data_user_petugas.index')
                        ->with('success','Data petugas telah berhasil dihapus');
    }
}