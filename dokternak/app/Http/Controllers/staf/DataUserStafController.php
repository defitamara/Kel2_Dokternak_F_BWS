<?php

namespace App\Http\Controllers\staf;

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
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        $data = Staf_it::select('staf_it.*', 'users.*')
            ->join('users', 'users.id', '=', 'staf_it.id') 
            ->where('staf_it.id','!=',0)
            ->get();

        return view('staf.dt_user_staf.index',compact('data','staf'));
    }

    public function cetak_pdf()
    {
        $dtstaf = Staf_it::select('staf_it.*', 'users.*')
            ->join('users', 'users.id', '=', 'staf_it.id') 
            ->where('staf_it.id','!=',0)
            ->get();
    	$pdf = PDF::loadview('staf/dt_user_staf/cetak_pdf',['dtstaf'=>$dtstaf]);
    	return view('staf.dt_user_staf.cetak_pdf',compact('dtstaf'));
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
        return view('staf.dt_user_staf.edit',compact('data','staf_it','staf'));
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
            'name' => $request->name,
            'email' => $request->email,
        ];

        User::where('id', $id)->update($data_update);


        return redirect()->route('dt_user_staf.index')
                        ->with('success','Data Staf telah berhasil diperbarui');
    }

    public function ubahpw($id)
    {
        $data = Staf_it::select('staf_it.*','users.*')
        ->join('users', 'users.id', '=', 'staf_it.id') 
        ->where('staf_it.id', $id)->first();
        
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        
        return view('staf.dt_user_staf.ubahpw',compact('data','staf'));
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

        return redirect()->route('dt_user_staf.index')
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
        return redirect()->route('dt_user_staf.index')
                        ->with('success','Data Staf telah berhasil dihapus');
    }
}