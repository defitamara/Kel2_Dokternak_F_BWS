<?php

namespace App\Http\Controllers\penyuluh;
use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Models\dokter;
// use App\Models\DokterUser;
use App\Models\Penyuluh;

class EditProfilController extends Controller
{
    
    public function index()
    {
        // $profil = DB::table('peternak')->paginate();
        // return view('frontend.profil',compact('profil'));  
    }

    public function edit($id)
    {
        $profil = DB::table('penyuluh')->where('id_penyuluh', $id)->first();
        return view('penyuluh.editprofilpenyuluh',compact('profil'));
        //return dd($profil);
    }
    public function update(Request $request , $id)
    {

        $message = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal 15 huruf!!!',
            'max' => ':attribute URL harus diisi maksimal 100 huruf!!!',
            'mimes' => ':attribute harus berupa gambar dengan format (JPEG, PNG, dan SVG)',
        ];

        $gbr=$request->nama_gambar;
        // if (isset($request->gambar) == NULL){
        if($request->has('foto')) {
            $getimageName = time().'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('data/data_penyuluh'), $getimageName);
        }else {
            $getimageName = $gbr;
        }
        


        $data_simpan = [
            'nama_dokter' => $request->nama_penyuluh,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'tempat' => $request->tempat,
            'telpon' => $request->telpon,
            'foto' => $getimageName,
            'jadwal_kerja' => $request->jadwal_kerja,
        ];

        Penyuluh::where('id_penyuluh', $id)->update($data_simpan);
        
        return redirect()->route('lppenyuluh')
                        ->with('success','Profil anda telah berhasil diperbarui');
    }
}
