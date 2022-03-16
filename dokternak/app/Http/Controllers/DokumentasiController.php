<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\dokumentasi;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class DokumentasiController extends Controller
{
    public function index()
    {
        $dokumentasi = DB::table('dokumentasi')->get();
        return view('backend.dokumentasi.index', compact('dokumentasi'));
        // return view('backend.peternak.index');
    }


    public function create()
    {
        $dokumentasi = null;
        return view('backend.dokumentasi.create',compact('dokumentasi'));
    }

    public function store(Request $request)
    {

        // DB::table('users')->insert([
        //     'name' => $request->name,
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'password' => Hash::make($request['password']),
        // ]);

        $message = [
            'numeric' => ':attributer harus diisi nomor.'
        ];

        $validator = FacadesValidator::make($request->all(),[
            // 'judul_tutorial' => 'required|string|min:15|max:100',
            // 'icon' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ], $message)->validate();

        $getimageName = time().'.'.$request->dokumentasi->getClientOriginalExtension();
        $request->dokumentasi->move(public_path('data/dokumentasi'), $getimageName);

        $data_simpan = [
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'dokumentasi' => $getimageName,
            'failed_at' => $request->failed_at
        ];

        dokumentasi::create($data_simpan);

        return redirect()->route('dokumentasi.index')
                        ->with('success','Data dokumentasi baru telah berhasil disimpan');
    }

    public function edit($id)
    {
        $dokumentasi = dokumentasi::where('id_dokumentasi',$id)->first();
        return view('backend.dokumentasi.create',compact('dokumentasi'));
    }

    public function update(Request $request, $id)
    {
        // DB::table('users')->where('id',$request->id)->update([
        //     'name' => $request->name,
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'password' => Hash::make($request['password']),
        // ]);

        $message = [
            'numeric' => ':attributer harus diisi nomor.'
        ];

        $validator = FacadesValidator::make($request->all(),[
            // 'nama' => 'required|string|max:100',
            // 'tingkatan' => 'required|numeric',
        ], $message)->validate();

        $gbr=$request->nama_dokumentasi;
        // if (isset($request->gambar) == NULL){
        if($request->has('dokumentasi')) {
            $getimageName = time().'.'.$request->dokumentasi->getClientOriginalExtension();
            $request->dokumentasi->move(public_path('data/dokumentasi'), $getimageName);
        }else {
            $getimageName = $gbr;
        }


        $data_simpan = [
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'dokumentasi' => $getimageName,
            'failed_at' => $request->failed_at
        ];
        

        dokumentasi::where('id_dokumentasi', $id)->update($data_simpan);

        return redirect()->route('dokumentasi.index')
                        ->with('success','Data dokumentasi telah berhasil diperbarui');
    }

    public function destroy($id)
    {
        $dokumentasi = dokumentasi::where('id_dokumentasi',$id)->delete();
        return redirect()->route('dokumentasi.index')
                        ->with('success','Data dokumentasi telah berhasil dihapus');
    }
}
