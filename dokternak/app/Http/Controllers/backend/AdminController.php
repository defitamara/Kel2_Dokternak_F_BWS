<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AdminUser;
use App\Models\admin;
use App\Models\User;
use Dotenv\Validator;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class AdminController extends Controller
{
    public function index()
    {
        $data = AdminUser::select('admin.*', 'users.*')
            ->join('users', 'users.id', '=', 'admin.id') 
            ->where('is_admin',1)
            ->get();

        return view('backend.admin.index',compact('data'));
    }


    public function cetak_pdf()
    {
        $data = [
        'admin' => Admin::with('roles')->where('is_admin',1)->get(),
        // 'admin' => Admin::with('roles')->orderBy('id','desc')->where('is_admin',1)->get(),
    ];
    	$pdf = PDF::loadview('backend/admin/cetak_pdf',['data'=>$data]);
    	return view ('backend.admin.cetak_pdf',compact('data'));
    }

    public function create()
    {
        // $role =  Role::where('id_role',1)->first();
        $admin = null;
        return view('backend.admin.create',compact('admin'));
    }

    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal 15 huruf!!!',
            'max' => ':attribute URL harus diisi maksimal 100 huruf!!!',
            'mimes' => ':attribute harus berupa gambar dengan format (JPEG, PNG, dan SVG)',
        ];

        $validator = FacadesValidator::make($request->all(),[
            'judul' => 'required|string|min:15|max:100',
            'id_ktg' => 'required|string|max:15',
            'sumber' => 'required|string|min:15|max:200',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ], $message)->validate();

        $status= "tampil";

        $getimageName = time().'.'.$request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('data/data_admin'), $getimageName);

        $data_simpan = [
            'name' => $request->nama,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'foto' => $getimageName,
            'password' => $request->password,
        ];

        AdminUser::create($data_simpan);

        return redirect()->route('admin.index')
                        ->with('success','Data Admin baru telah berhasil disimpan, dimohon untuk menunggu konfirmasi dari Admin')
                        ->with('image',$getimageName);
    }

    public function edit($id)
    {
        $admin = AdminUser::select('admin.*','users.*')
        ->join('users', 'users.id', '=', 'admin.id') 
        ->where('id_admin', $id)->first();
        return view('backend.admin.create',compact('admin'));
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
        
        if($request->has('foto')) {
            $getimageName = time().'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('data/data_admin'), $getimageName);
        }else {
            $getimageName = $gbr;
        }

        $data_simpan = [
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'foto' => $getimageName,
        ];

        AdminUser::where('id_admin', $id)->update($data_simpan);

        return redirect()->route('admin.index')
                        ->with('success','Data admin telah berhasil diperbarui');
    }

    public function destroy($id)
    {

        
        $admin = User::where('id',$id)->delete();
                return redirect()->route('admin.index')
                            ->with('success','Data admin telah berhasil dihapus');
    }
}
