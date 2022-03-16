<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kritikdansaran;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class DataKritikdanSaranController extends Controller
{
    public function index()
    {
        $ks = DB::table('krtik_dan_saran')->get();
        return view('backend.data_ks.index', compact('ks'));
        // return view('backend.peternak.index');
    }

    public function cetak_pdf()
    {
        $ks = DB::table('krtik_dan_saran')->get();
    	$pdf = PDF::loadview('backend/data_ks/cetak_pdf',['ks'=>$ks]);
    	return view ('backend.data_ks.cetak_pdf',compact('ks'));
    }

    public function create()
    {
        $ks = null;
        return view('backend.data_ks.create',compact('ks'));
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


        $data_simpan = [
            'nama' => $request->nama,
            'komentar' => $request->komentar,
            'tanggal' => $request->tanggal,
            'email_hp' => $request->email_hp,
            'pekerjaan' => $request->pekerjaan,
        ];

        kritikdansaran::create($data_simpan);

        return redirect()->route('data_ks.index')
                        ->with('success','Data kritik_dan_saran baru telah berhasil disimpan');
    }

    public function edit($id)
    {
        $ks = KritikdanSaran::where('id_ks',$id)->first();
        return view('backend.data_ks.create',compact('ks'));
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

        $data_simpan = [
            'nama' => $request->nama,
            'komentar' => $request->komentar,
            'tanggal' => $request->tanggal,
            'email_hp' => $request->email_hp,
            'pekerjaan' => $request->pekerjaan,
        ];

        KritikdanSaran::where('id_ks', $id)->update($data_simpan);

        return redirect()->route('data_ks.index')
                        ->with('success','Data kritik_dan_saran telah berhasil diperbarui');
    }

    public function destroy($id)
    {
        $ks = KritikdanSaran::where('id_ks',$id)->delete();
        return redirect()->route('data_ks.index')
                        ->with('success','Data kritik_dan_saran telah berhasil dihapus');
    }
}
