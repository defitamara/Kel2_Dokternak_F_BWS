<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Models\PeternakUser;
use App\Models\Role;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;

class DataUserPeternakController extends Controller
{
    public function index()
    {
        $data = PeternakUser::select('peternak.*', 'users.*')
            ->join('users', 'users.id', '=', 'peternak.id') 
            ->where('peternak.id','!=',0)
            ->get();

        return view('backend.data_user_peternak.index',compact('data'));
    }

    public function cetak_pdf()
    {
        $data_peternak = PeternakUser::select('peternak.*', 'users.*')
            ->join('users', 'users.id', '=', 'peternak.id') 
            ->where('peternak.id','!=',0)
            ->get();
    	$pdf = PDF::loadview('backend/data_user_peternak/cetak_pdf',['data_peternak'=>$data_peternak]);
    	return view('backend.data_user_peternak.cetak_pdf',compact('data_peternak'));
    }

    public function create()
    {


        $data_peternak = PeternakUser::select('peternak.*')
            ->where('id',0)
            ->get();

        return view('backend.data_user_peternak.create',compact('data_peternak'));
    }

    public function store(Request $request)
    {

        $nama = $request->namadepan_peternak;  

        $role = 0;
        $user = User::create([
            'name' =>$nama,
            'email' =>$request->email_peternak,
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

        PeternakUser::where('namadepan_peternak', $nama)->update($data_simpan);

        return redirect()->route('data_user_staf.index')
                        ->with('success','Data Peternak baru telah berhasil disimpan');
    }


    public function edit($id)
    {

        $data = PeternakUser::select('peternak.*','users.*')
        ->join('users', 'users.id', '=', 'peternak.id') 
        ->where('peternak.id', $id)->first();

        $peternak = PeternakUser::select('peternak.*')
            ->where('id','!=',0)
            ->get();
        
        $ptnk = DB::table('users')->join('peternak','peternak.id','=','users.id')
            ->get();
        return view('backend.data_user_peternak.edit',compact('data','peternak'));
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
            'email' => $request->email_peternak,
        ];

        User::where('id', $id)->update($data_update);


        return redirect()->route('data_user_peternak.index')
                        ->with('success','Data peternak telah berhasil diperbarui');
    }

    public function ubahpw($id)
    {
        $data = PeternakUser::select('peternak.*','users.*')
        ->join('users', 'users.id', '=', 'peternak.id') 
        ->where('peternak.id', $id)->first();
        
        $ptnk = DB::table('users')->join('peternak','peternak.id','=','users.id')
            ->get();
        
        return view('backend.data_user_peternak.ubahpw',compact('data'));
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

        return redirect()->route('data_user_peternak.index')
                        ->with('success','Password Akun Peternak telah berhasil diperbarui');
    }

    public function destroy($id)
    {
        $admin = User::where('id',$id)->delete();

        // Mengubah id di data staf menjadi 0, artinya tidak punya akun
        $hapusId = 0;
        $data_simpan = [
            'id' => $hapusId,
        ];

        PeternakUser::where('id', $id)->update($data_simpan);

        // $petugasuser= DokterUser::where('id',$id)->delete();
        return redirect()->route('data_user_peternak.index')
                        ->with('success','Data peternak telah berhasil dihapus');
    }
}