<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\banner;
use DateTime;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Crypt;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class DataBannerController extends Controller
{
    public function index()
    {
        $banner = DB::table('banner')->get();
        return view('backend.data_banner.index', compact('banner'));
        // return view('backend.peternak.index');
    }

    public function cetak_pdf()
    {
        $banner = DB::table('banner')->get();
    	$pdf = PDF::loadview('backend/data_banner/cetak_pdf',['banner'=>$banner]);
    	return view ('backend.data_banner.cetak_pdf',compact('banner'));
    }
    public function create()
    {
        $banner = null;
        return view('backend.data_banner.create',compact('banner'));
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
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'status' => 'required|string|min:4|max:100',
        ], $message)->validate();

        $status= "tampil";
        // $dt = new DateTime();
                // echo $dt->format('YmdH');
        // $count = Tutorial::all()->count();
        // $id=$dt->format('YmdH');
        $getimageName = time().'.'.$request->gambar->getClientOriginalExtension();
        $request->gambar->move(public_path('data/data_banner'), $getimageName);

        $data_simpan = [
            'gambar' =>$getimageName,
            'status' => $request->status,
        ];

        banner::create($data_simpan);

        return redirect()->route('data_banner.index')
                        ->with('success','Data banner baru telah berhasil disimpan');
    }

    public function edit($id)
    {
        $banner = Banner::where('id_banner',$id)->first();
        return view('backend.data_banner.create',compact('banner'));
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

        $gbr=$request->nama_gambar;
        // if (isset($request->gambar) == NULL){
        if($request->has('gambar')) {
            $getimageName = time().'.'.$request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('data/data_banner'), $getimageName);
        }else {
            $getimageName = $gbr;
        }
        // $getimageName = time().'.'.$request->gambar->getClientOriginalExtension();
        // $request->banner->move(public_path('data/data_banner'), $getimageName);

        $data_simpan = [
            'id_banner' =>$id,
            'gambar' =>$getimageName,
            'status' => $request->status,
        ];

        Banner::where('id_banner', $id)->update($data_simpan);

        return redirect()->route('data_banner.index')
                        ->with('success','Data banner telah berhasil diperbarui');
    }

    public function destroy($id)
    {
        $banner = Banner::where('id_banner',$id)->delete();
        return redirect()->route('data_banner.index')
                        ->with('success','Data banner telah berhasil dihapus');
    }
}
