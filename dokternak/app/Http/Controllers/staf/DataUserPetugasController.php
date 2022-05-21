<?php

namespace App\Http\Controllers\staf;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Models\Petugas;
use App\Models\Role;
use App\Models\DokterUser;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;

class DataUserPetugasController extends Controller
{
    public function index()
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        $data = DokterUser::select('dokter.*', 'users.*')
            ->join('users', 'users.id', '=', 'dokter.id') 
            ->where('dokter.id','!=',0)
            ->get();

        return view('staf.dt_user_petugas.index',compact('data','staf'));
    }

    public function cetak_pdf()
    {
        $dtdokter = DokterUser::select('dokter.*', 'users.*')
            ->join('users', 'users.id', '=', 'dokter.id') 
            ->where('dokter.id','!=',0)
            ->get();
    	$pdf = PDF::loadview('staf/dt_user_petugas/cetak_pdf',['dtdokter'=>$dtdokter]);
    	return view('staf.dt_user_petugas.cetak_pdf',compact('dtdokter'));
    }

    public function create()
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();

        //$datapetugas = null;
        $petugas = DokterUser::select('dokter.*')
            ->where('id',0)
            ->get();
        //return $datapetugas;
        return view('staf.dt_user_petugas.create',compact('petugas','staf'));
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

        // $status= "tampil";

        $data_simpan = [
            'id' => $id_user,
            'email' => $emailptr,
        ];

        DokterUser::where('nama_dokter', $nama)->update($data_simpan);

        return redirect()->route('dt_user_petugas.index')
                        ->with('success','Data petugas baru telah berhasil disimpan');
    }

    public function edit($id)
    {

        $datapetugas = DokterUser::select('dokter.*','users.*')
        ->join('users', 'users.id', '=', 'dokter.id') 
        ->where('dokter.id', $id)->first();

        $petugas = DokterUser::select('dokter.*')
            ->where('id','!=',0)
            ->get();
        
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        return view('staf.dt_user_petugas.edit',compact('datapetugas','petugas','staf'));
    }

    public function update(Request $request, $id)
    {
        $nama = $request->name;  

        $message = [
            'numeric' => ':attributer harus diisi nomor.'
        ];

        $validator2 = FacadesValidator::make($request->all(),[
            'email' => 'required|string|max:40',
        ], $message)->validate();

        $data_update2 = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        User::where('id', $id)->update($data_update2);


        $validator = FacadesValidator::make($request->all(),[
            'email' => 'required|string|max:40',
        ], $message)->validate();

        $data_update = [
            'email' => $request->email,
        ];

        DokterUser::where('id', $id)->update($data_update);


        return redirect()->route('dt_user_petugas.index')
                        ->with('success','Data Petugas telah berhasil diperbarui');
    }

    public function ubahpw($id)
    {
        $datapetugas = DokterUser::select('dokter.*','users.*')
        ->join('users', 'users.id', '=', 'dokter.id') 
        ->where('dokter.id', $id)->first();
        
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        
        return view('staf.dt_user_petugas.ubahpw',compact('datapetugas','staf'));
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

        return redirect()->route('dt_user_petugas.index')
                        ->with('success','Password Akun Petugas telah berhasil diperbarui');
    }

    public function destroy($id)
    {
        $admin = User::where('id',$id)->delete();

        // Mengubah id di data dokter menjadi 0, artinya tidak punya akun
        $hapusId = 0;
        $data_simpan = [
            'id' => $hapusId,
        ];

        DokterUser::where('id', $id)->update($data_simpan);

        // $petugasuser= DokterUser::where('id',$id)->delete();
        return redirect()->route('dt_user_petugas.index')
                        ->with('success','Data Petugas telah berhasil dihapus');
    }
}