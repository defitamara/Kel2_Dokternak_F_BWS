<?php

namespace App\Http\Controllers\kopus;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Puskeswan;
use App\Models\User;
use DateTime;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Facades\Auth;

class DataPuskeswanController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $id = Auth::id();
        $user = User::where('id',$id)->first();
        $kopus = DB::table('users')
            ->join('koordinator_puskeswan','koordinator_puskeswan.id','=','users.id')
            ->join('puskeswan','puskeswan.id_puskeswan','=','koordinator_puskeswan.id_puskeswan')
            ->where('users.id','=',$id)
            ->get();
        return view('kopus.tabel_puskeswan.index', compact('kopus'));
    }

    public function cetak_pdf($id)
    {
        $puskeswan = DB::table('puskeswan')
            ->where('puskeswan.id_puskeswan','=',$id)
            ->get();
    	$pdf = PDF::loadview('kopus/tabel_puskeswan.cetak_pdf',['puskeswan'=>$puskeswan]);
    	return view('kopus.tabel_puskeswan.cetak_pdf',compact('puskeswan'));
    }

    public function edit($id)
    {
        $kopus = DB::table('users')
            ->join('koordinator_puskeswan','koordinator_puskeswan.id','=','users.id')
            ->join('puskeswan','puskeswan.id_puskeswan','=','koordinator_puskeswan.id_puskeswan')
            ->get();
        $puskeswan = Puskeswan::where('id_puskeswan',$id)->first();
        return view('kopus.tabel_puskeswan.edit',compact('puskeswan','kopus'));
    }

    public function update(Request $request, $id)
    {

        $message = [
            'numeric' => ':attributer harus diisi nomor.'
        ];

        $validator = FacadesValidator::make($request->all(),[
            // 'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            // 'nama' => 'required|string|max:100',
            // 'tingkatan' => 'required|numeric',
        ], $message)->validate();


        $gbr=$request->nama_gambar;
        if($request->has('gambar')) {
            $getimageName = time().'.'.$request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('data/data_puskeswan'), $getimageName);
        }else {
            $getimageName = $gbr;
        }

        $data_simpan = [
            'id_puskeswan' => $request->id_puskeswan,
            'nama_puskeswan' => $request->nama_puskeswan,
            'alamat' =>$request->alamat,
            'wilker' =>$request->wilker,
            'jam_kerja' =>$request->jam_kerja,
            'gambar' => $getimageName,
            'maps' =>$request->maps,
            'nomer' =>$request->nomer,
        ];

        Puskeswan::where('id_puskeswan', $id)->update($data_simpan);

        return redirect()->route('tabel_puskeswan.index')
                        ->with('success','Data puskeswan telah berhasil diperbarui');
    }

    public function detail($id)
    {
        $kopus = DB::table('users')
            ->join('koordinator_puskeswan','koordinator_puskeswan.id','=','users.id')
            ->join('puskeswan','puskeswan.id_puskeswan','=','koordinator_puskeswan.id_puskeswan')
            ->get();
        $puskeswan = Puskeswan::where('id_puskeswan',$id)->get();
        return view('kopus.tabel_puskeswan.detail',compact('puskeswan','kopus'));
    }

}
