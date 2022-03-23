<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\informasi;
use DateTime;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class DataInformasiController extends Controller
{
    public function index()
    {
        $informasi = DB::table('informasi')->get();
        return view('backend.data_informasi.index', compact('informasi'));
        // return view('backend.peternak.index');
    }

    public function cetak_pdf()
    {
        $informasi = DB::table('informasi')->get();
    	$pdf = PDF::loadview('backend/data_informasi.cetak_pdf',['informasi'=>$informasi]);
    	return view ('backend.data_informasi.cetak_pdf',compact('informasi'));
    }


    public function create()
    {
        $informasi = null;
        return view('backend.data_informasi.create',compact('informasi'));
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
            'judul' => 'required|string|min:5|max:100',
        ], $message)->validate();

        $status= "tampil";
        $dt = new DateTime();
                // echo $dt->format('YmdH');
        // $count = Tutorial::all()->count();
        $id=$dt->format('YmdH');
        // $getimageName = time().'.'.$request->icon->getClientOriginalExtension();
        // $request->icon->move(public_path('data/data_informasi'), $getimageName);

        $data_simpan = [
            'id_info' =>$id,
            'judul' => $request->judul,
            'isi' =>$request->isi,
        ];

        informasi::create($data_simpan);

        return redirect()->route('data_informasi.index')
                        ->with('success','Data informasi baru telah berhasil disimpan');
    }

    public function edit($id)
    {
        $informasi = Informasi::where('id_info',$id)->first();
        return view('backend.data_informasi.create',compact('informasi'));
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

        $status= "tampil";

        // $icn=$request->nama_icon;
        // // if (isset($request->gambar) == NULL){
        // if($request->has('icon')) {
        // $getimageName = time().'.'.$request->icon->getClientOriginalExtension();
        // $request->icon->move(public_path('data/data_tutorial'), $getimageName);
        // }else {
        //     $getimageName = $icn;
        // }

        $data_simpan = [
            'judul' => $request->judul,
            'isi' =>$request->isi,
            // 'icon' =>$getimageName,
        ];

        Informasi::where('id_info', $id)->update($data_simpan);

        return redirect()->route('data_informasi.index')
                        ->with('success','Data informasi telah berhasil diperbarui');
    }

    public function detail($id)
    {
        $informasi = Informasi::where('id_info',$id)->get();
        return view('backend.data_informasi.detail', compact('informasi'));
        
    }

    public function destroy($id)
    {
        $informasi = Informasi::where('id_info',$id)->delete();
        return redirect()->route('data_informasi.index')
                        ->with('success','Data informasi telah berhasil dihapus');
    }
}
