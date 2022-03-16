<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PeternakUser;
use App\Models\Peternak;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use DateTime;

class PeternakController extends Controller
{
    public function index()
    {
    
        $peternak = PeternakUser::select('peternak.*', 'users.*')
            ->join('users', 'users.id', '=', 'peternak.id') 
            ->where('is_admin',0)
            ->get();

        return view('backend.peternak.index',compact('peternak'));
    }

    public function cetak_pdf()
    {
        $peternak = PeternakUser::select('peternak.*', 'users.*')
        ->join('users', 'users.id', '=', 'peternak.id') 
        ->where('is_admin',0)
        ->get();
    	$pdf = PDF::loadview('backend/peternak/cetak_pdf',['peternak'=>$peternak]);
    	return view ('backend.peternak.cetak_pdf',compact('peternak'));
    }

    public function create()
    {
        $peternak = null;
        return view('backend.peternak.create',compact('peternak'));
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

        $dt = new DateTime();
        $id_peternak=$dt->format('mdHis ');

        $id_user = $user->id;
        $nama_user = $user->name;
        $email_user = $user->email;
        $pass_user = $user->password;

        $message = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal 15 huruf!!!',
            'max' => ':attribute URL harus diisi maksimal 100 huruf!!!',
            'mimes' => ':attribute harus berupa gambar dengan format (JPEG, PNG, dan SVG)',
        ];

        $validator = FacadesValidator::make($request->all(),[
            'namadepan_peternak' => 'required|string|min:2|max:100',
            'namabelakang_peternak' => 'required|string|min:3|max:100',
            'email_peternak' => 'required|string|min:15|max:50',
            'jenis_kelamin' => 'required|string|min:5|max:20',
            'foto_peternak' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ], $message)->validate();

        $status= "tampil";

        $getimageName = time().'.'.$request->foto_peternak->getClientOriginalExtension();
        $request->foto_peternak->move(public_path('data/data_peternak'), $getimageName);

        $data_simpan = [
            'id'=>$id_user,
            'id_peternak' => $id_peternak,
            'namadepan_peternak' => $nama,
            'namabelakang_peternak' => $request->namabelakang_peternak,
            'email_peternak'=> $email_user,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'foto_peternak' => $getimageName,
        ];

        PeternakUser::create($data_simpan);

        return redirect()->route('peternak.index')
                        ->with('success','Data peternak baru telah berhasil disimpan, dimohon untuk menunggu konfirmasi dari Admin')
                        ->with('image',$getimageName);
    }

    public function edit($id)
    {
        $peternak = PeternakUser::select('peternak.*','users.*')
        ->join('users', 'users.id', '=', 'peternak.id') 
        ->where('id_peternak', $id)->first();
        return view('backend.peternak.create',compact('peternak'));
        
    }

    public function update(Request $request , $id)
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
            'namadepan_peternak' => $request->namadepan_peternak,
            'namabelakang_peternak' => $request->namabelakang_peternak,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'foto_peternak' => $getimageName,
        ];

        PeternakUser::where('id_peternak', $id)->update($data_simpan);

        return redirect()->route('peternak.index')
                        ->with('success','Data peternak telah berhasil diperbarui');
    }

    public function destroy($id)
    {
        
        //$peternak = PeternakUser::where('id_peternak',$id)->delete();
        //$iduser = $peternak->id; 
        $user = User::where('id',$id)->delete();
        return redirect()->route('peternak.index')
                        ->with('success','Data peternak telah berhasil dihapus');
          //return $peternak;
    }

   
}
