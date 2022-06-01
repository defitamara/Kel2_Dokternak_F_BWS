<?php

namespace App\Http\Controllers\staf;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Puskeswan;
use DateTime;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class DataPuskeswanController extends Controller
{
    public function index()
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        $puskeswan = DB::table('puskeswan')->get();
        return view('staf.dt_puskeswan.index', compact('puskeswan','staf'));
    }

    public function cetak_pdf()
    {
        $puskeswan = DB::table('puskeswan')->get();
    	$pdf = PDF::loadview('staf/dt_puskeswan.cetak_pdf',['puskeswan'=>$puskeswan]);
    	return view('staf.dt_puskeswan.cetak_pdf',compact('puskeswan'));
    }

    public function create()
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        $puskeswan = null;
        return view('staf.dt_puskeswan.create',compact('puskeswan','staf'));
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
            // 'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            // 'nama' => 'required|string|max:100',
            // 'tingkatan' => 'required|numeric',
        ], $message)->validate();
         
        $dt = new DateTime();
        $id=$dt->format('YmdH');

        $gbr=$request->nama_gambar;
        if($request->has('gambar')) {
        $getimageName = time().'.'.$request->gambar->getClientOriginalExtension();
        $request->gambar->move(public_path('data/data_puskeswan'), $getimageName);
        }else {
            $getimageName = $gbr;
        }

        $data_simpan = [
            'id_puskeswan' => $id,
            'nama_puskeswan' => $request->nama_puskeswan,
            'alamat' =>$request->alamat,
            'wilker' =>$request->wilker,
            'jam_kerja' =>$request->jam_kerja,
            'gambar' => $getimageName,
            'maps' =>$request->maps,
            'nomer' =>$request->nomer,
        ];

        Puskeswan::create($data_simpan);

        return redirect()->route('dt_puskeswan.index')
                        ->with('success','Data puskeswan baru telah berhasil disimpan')
                        ->with('image',$getimageName);
    }

    public function edit($id)
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        $puskeswan = Puskeswan::where('id_puskeswan',$id)->first();
        return view('staf.dt_puskeswan.create',compact('puskeswan','staf'));
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

        return redirect()->route('dt_puskeswan.index')
                        ->with('success','Data puskeswan telah berhasil diperbarui');
    }

    public function detail($id)
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        $puskeswan = Puskeswan::orderBy('id_puskeswan','asc')
                   ->where('id_puskeswan',$id)
                   ->get();
        return view('staf.dt_puskeswan.detail',compact('puskeswan','staf'));
    }

    public function destroy($id)
    {
        $puskeswan = Puskeswan::where('id_puskeswan',$id)->delete();
        return redirect()->route('dt_puskeswan.index')
                        ->with('success','Data puskeswan telah berhasil dihapus');
    }
}
