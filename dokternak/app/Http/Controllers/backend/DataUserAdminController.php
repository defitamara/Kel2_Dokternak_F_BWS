<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Models\AdminUser;
use App\Models\admin;
use App\Models\Role;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;

class DataUserAdminController extends Controller
{
    public function index()
    {
        $data = User:: where('is_admin','=',1)
            ->get();

        return view('backend.data_user_admin.index',compact('data'));
    }

    public function cetak_pdf()
    {
        $data_admin = User:: where('is_admin','=',1)
        ->get();
    	$pdf = PDF::loadview('backend/data_user_admin/cetak_pdf',['data_admin'=>$data_admin]);
    	return view('backend.data_user_admin.cetak_pdf',compact('data_admin'));
    }

    public function create()
    {


        $data_admin = User:: where('is_admin','=',1)
        ->get();

        return view('backend.data_user_admin.create',compact('data_admin'));
    }

    public function store(Request $request)
    {

        $nama = $request->name;  

        $role = 1;
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

        AdminUser::where('nama', $nama)->update($data_simpan);

        return redirect()->route('data_user_admin.index')
                        ->with('success','Data Peternak baru telah berhasil disimpan');
    }


    public function edit($id)
    {

        $data = User::where('is_admin','=',1)->first();

        $admin = User:: where('is_admin','=',1)
        ->get();
        
        // $ptnk = DB::table('users')->join('is_admin','=','users.id')
        //     ->get();
        return view('backend.data_user_admin.edit',compact('data','admin'));
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


        return redirect()->route('data_user_admin.index')
                        ->with('success','Data admin telah berhasil diperbarui');
    }

    public function ubahpw($id)
    {
        $data = User:: where('is_admin','=',1) ->first();
        
        $ptnk = DB::table('users')->join('admin','admin.id','=','users.id')
            ->get();
        
        return view('backend.data_user_admin.ubahpw',compact('data'));
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

        return redirect()->route('data_user_admin.index')
                        ->with('success','Password Akun Admin telah berhasil diperbarui');
    }

    public function destroy($id)
    {
        $admin = User::where('id',$id)->delete();

        // Mengubah id di data staf menjadi 0, artinya tidak punya akun
        $hapusId = 0;
        $data_simpan = [
            'id' => $hapusId,
        ];

        AdminUser::where('id', $id)->update($data_simpan);

        // $petugasuser= DokterUser::where('id',$id)->delete();
        return redirect()->route('data_user_admin.index')
                        ->with('success','Data admin telah berhasil dihapus');
    }
}