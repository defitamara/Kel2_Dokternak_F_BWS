<?php

namespace App\Http\Controllers\staf;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Artikel;
use App\Models\KatArtikel;
use App\Models\Staf_it;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Crypt;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class DataArtikelController extends Controller
{
    public function index()
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();

        $artikel = Artikel::join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'artikel.id_ktg')
                    ->where('status','=','tampil')
                    ->orderBy('id_artikel','desc')
                    ->get();

        $artikel2 = Artikel::join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'artikel.id_ktg')
                    ->where('status','=','notampil')
                    ->orderBy('id_artikel','desc')
                    ->get();

        return view('staf.dt_artikel.index',compact('artikel','artikel2','staf'));
    }

    public function cetakartikel()
    {
    	// $artikel = Artikel::all();
        $artikel = Artikel::join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'artikel.id_ktg')
                    ->orderBy('id_artikel','desc')
                    ->where('status','=','tampil')
                    ->get();
        $artikel2 = Artikel::join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'artikel.id_ktg')
                    ->orderBy('id_artikel','desc')
                    ->where('status','=','notampil')
                    ->get();
        // $pdf = PDF::loadView('backend.data_artikel.cetak_pdf', $artikel);
    	$pdf = PDF::loadview('staf/dt_artikel/cetak_pdf',['artikel'=>$artikel],['artikel2'=>$artikel2]);
    	return view('staf.dt_artikel.cetak_pdf',compact('artikel','artikel2'));
    }

    public function create()
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        $kategori = KatArtikel::all();
        return view('staf.dt_artikel.create',compact('kategori','staf'));
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
            'id_ktg' => 'required|string|max:15',
            'sumber' => 'required|string|min:15|max:200',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ], $message)->validate();

        $status= "tampil";

        $getimageName = time().'.'.$request->gambar->getClientOriginalExtension();
        $request->gambar->move(public_path('data/data_artikel'), $getimageName);

        $data_simpan = [
            'id_ktg' => $request->id_ktg,
            'tanggal' => $request->tanggal,
            'nama_penulis' => $request->nama_penulis,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $getimageName,
            'sumber' => $request->sumber,
            'status' => $status,
        ];

        Artikel::create($data_simpan);

        return redirect()->route('dt_artikel.index')
                        ->with('success','Data artikel baru telah berhasil disimpan')
                        ->with('image',$getimageName);
    }
    public function edit($id)
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get(); //agar foto staf di template.blade.php bisa muncul
        $artikel = Artikel::where('id_artikel',$id)->first();
        $kategori = KatArtikel::all();
        return view('staf.dt_artikel.create',compact('artikel','kategori','staf'));
    }

    public function konfirmasi($id)
    {

        $status = "tampil";

        $data_simpan = [
            'status' => $status,
        ];

        Artikel::where('id_artikel', $id)->update($data_simpan);

        return redirect()->route('dt_artikel.index')
                        ->with('success','Data artikel telah berhasil ditampilkan pada halaman website');
    }

    public function batalkonfirmasi($id)
    {

        $status = "notampil";

        $data_simpan = [
            'status' => $status,
        ];

        Artikel::where('id_artikel', $id)->update($data_simpan);

        return redirect()->route('dt_artikel.index')
                        ->with('success','Data artikel telah berhasil disembunyikan dari halaman website');
    }

    public function update(Request $request, $id)
    {

        $message = [
            'numeric' => ':attributer harus diisi nomor.'
        ];

        $validator = FacadesValidator::make($request->all(),[
            // 'nama' => 'required|string|max:100',
            // 'tingkatan' => 'required|numeric',
        ], $message)->validate();

        // $status= "tampil";

        $gbr=$request->nama_gambar;
        // if (isset($request->gambar) == NULL){
        if($request->has('gambar')) {
            $getimageName = time().'.'.$request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('data/data_artikel'), $getimageName);
        }else {
            $getimageName = $gbr;
        }

        // $getimageName = time().'.'.$request->gambar->getClientOriginalExtension();
        // $request->gambar->move(public_path('data/data_artikel'), $getimageName);
        $data_simpan = [
            'id_ktg' => $request->id_ktg,
            // 'tanggal' => $request->tanggal, saat diedit, tanggal akan tetap menggunakan tanggal pembuatan
            'nama_penulis' => $request->nama_penulis,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $getimageName,
            'sumber' => $request->sumber,
            // 'status' => $status, statu hanya berubah saat  menekan tampilkan
        ];

        Artikel::where('id_artikel', $id)->update($data_simpan);

        return redirect()->route('dt_artikel.index')
                        ->with('success','Data artikel telah berhasil diperbarui');
    }

    public function detail($id)
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        $artikel = Artikel::join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'artikel.id_ktg')
                   ->orderBy('id_artikel','asc')
                   ->where('id_artikel',$id)
                   ->get();
        return view('staf.dt_artikel.detail',compact('artikel','staf'));
    }

    public function destroy($id)
    {
        $artikel = Artikel::where('id_artikel',$id)->delete();
        return redirect()->route('dt_artikel.index')
                        ->with('success','Data artikel telah berhasil dihapus');
    }
}
