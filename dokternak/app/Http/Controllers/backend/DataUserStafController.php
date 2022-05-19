<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Models\Staf_it;
use App\Models\Role;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;

class DataUserStafController extends Controller
{
    public function index()
    {
        $data = Staf_it::select('staf_it.*', 'users.*')
            ->join('users', 'users.id', '=', 'staf_it.id') 
            ->where('staf_it.id','!=',0)
            ->get();

        return view('backend.data_user_staf.index',compact('data'));
    }

    public function cetak_pdf()
    {
        $data_staf = Staf_it::select('staf_it.*', 'users.*')
            ->join('users', 'users.id', '=', 'staf_it.id') 
            ->where('staf_it.id','!=',0)
            ->get();
    	$pdf = PDF::loadview('backend/data_user_staf/cetak_pdf',['data_staf'=>$data_staf]);
    	return view('backend.data_user_staf.cetak_pdf',compact('data_staf'));
    }

    public function create()
    {


        $data_staf = Staf_it::select('staf_it.*')
            ->where('id',0)
            ->get();

        return view('backend.data_user_staf.create',compact('data_staf'));
    }

    public function store(Request $request)
    {

        $nama = $request->nama_staf;  

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

        Staf_it::where('nama_staf', $nama)->update($data_simpan);

        return redirect()->route('data_user_staf.index')
                        ->with('success','Data Staf baru telah berhasil disimpan');
    }


    public function edit($id)
    {

        $data = Staf_it::select('staf_it.*','users.*')
        ->join('users', 'users.id', '=', 'staf_it.id') 
        ->where('staf_it.id', $id)->first();

        $staf_it = Staf_it::select('staf_it.*')
            ->where('id','!=',0)
            ->get();
        
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        return view('backend.data_user_staf.edit',compact('data','staf_it'));
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


        return redirect()->route('data_user_staf.index')
                        ->with('success','Data Staf telah berhasil diperbarui');
    }

    public function ubahpw($id)
    {
        $data = Staf_it::select('staf_it.*','users.*')
        ->join('users', 'users.id', '=', 'staf_it.id') 
        ->where('staf_it.id', $id)->first();
        
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        
        return view('backend.data_user_staf.ubahpw',compact('data'));
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

        return redirect()->route('data_user_staf.index')
                        ->with('success','Password Akun Staf telah berhasil diperbarui');
    }

    public function destroy($id)
    {
        $admin = User::where('id',$id)->delete();

        // Mengubah id di data staf menjadi 0, artinya tidak punya akun
        $hapusId = 0;
        $data_simpan = [
            'id' => $hapusId,
        ];

        Staf_it::where('id', $id)->update($data_simpan);

        // $petugasuser= DokterUser::where('id',$id)->delete();
        return redirect()->route('data_user_staf.index')
                        ->with('success','Data Staf telah berhasil dihapus');
    }
}