<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\peternak;
use App\Models\PeternakUser;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    
    public function index()
    {
        $id = Auth::id();
        // $profil = DB::table('peternak')->where('id', $id)->first();
        $profil = PeternakUser::select('peternak.*','users.*')
                ->join('users', 'users.id', '=', 'peternak.id')
                ->where('peternak.id', $id)->first();
        return view('frontend.profil',compact('profil'));  
        return $profil;
    }

    public function edit($id)
    {
        $profil = DB::table('peternak')->where('id_peternak', $id)->first();
        return view('frontend.editprofil',compact('profil'));
        //return dd($profil);
    }
    public function update(Request $request , $id)
    {
        // DB::table('users')->where('id',$request->id)->update([
        //     'name' => $request->name,
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'password' => Hash::make($request['password']),
        // ]);

        $message = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal 15 huruf!!!',
            'max' => ':attribute URL harus diisi maksimal 100 huruf!!!',
            'mimes' => ':attribute harus berupa gambar dengan format (JPEG, PNG, dan SVG)',
        ];

        $gbr=$request->nama_gambar;
        // if (isset($request->gambar) == NULL){
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
        
        return redirect()->route('profil.index')
                        ->with('success','Data peternak telah berhasil diperbarui');
    }
}
