<?php

namespace App\Http\Controllers\staf;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\informasi;
use App\Models\Staf_it;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Crypt;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class DataInformasiController extends Controller
{
    public function index()
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();

        $informasi = informasi::all();

        return view('staf.dt_informasi.index',compact('informasi','staf'));
    }

    public function cetakinformasi()
    {
        $informasi = informasi::all();
    	$pdf = PDF::loadview('staf/dt_informasi/cetak_pdf',['informasi'=>$informasi]);
    	return view('staf.dt_informasi.cetak_pdf',compact('informasi'));
    }

    public function create()
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        return view('staf.dt_informasi.create',compact('staf'));
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
            'judul' => 'required|string|min:15|max:100',
            'isi' => 'required|string|min:15|max:1000',
        ], $message)->validate();

        $data_simpan = [
            'judul' => $request->judul,
            'isi' => $request->isi,
        ];

        informasi::create($data_simpan);

        return redirect()->route('dt_informasi.index')
                        ->with('success','Data informasi baru telah berhasil disimpan');
    }
    public function edit($id)
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get(); //agar foto staf di template.blade.php bisa muncul
        $informasi = informasi::where('id_info',$id)->first();
        return view('staf.dt_informasi.create',compact('informasi','staf'));
    }

    public function update(Request $request, $id)
    {

        $data_simpan = [
            'judul' => $request->judul,
            'isi' => $request->isi,
        ];

        informasi::where('id_info', $id)->update($data_simpan);

        return redirect()->route('dt_informasi.index')
                        ->with('success','Data informasi telah berhasil diperbarui');
    }

    public function detail($id)
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        $informasi = informasi::orderBy('id_info','asc')
                   ->where('id_info',$id)
                   ->get();
        return view('staf.dt_informasi.detail',compact('informasi','staf'));
    }

    public function destroy($id)
    {
        $informasi = informasi::where('id_info',$id)->delete();
        return redirect()->route('dt_informasi.index')
                        ->with('success','Data informasi telah berhasil dihapus');
    }
}
