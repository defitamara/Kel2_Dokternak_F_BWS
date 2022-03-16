<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\artikel;
use App\Models\KatArtikel;

class ArtikelController extends Controller
{

    public function index()
    {
        // $artikel = Artikel::orderBy('tanggal', 'desc')->paginate(2);
        $artikel = DB::table('artikel')->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'artikel.id_ktg')
        ->orderBy('id_artikel','desc')
        ->where('status','=','tampil')
        ->paginate(2);

        $kategori_artikel = KatArtikel::all();
        return view('frontend.artikel',compact('artikel','kategori_artikel'))->with('artikel', $artikel);
        // return view('frontend.artikel');

        // mengirim data pegawai ke view index
		// return view('frontend.artikel',['artikel' => $artikel]);
    }

    public function cari(Request $request)
    {
        //Menangkap data pencarian
        $cari = $request->cari;

        //mengambul data dari tabel artikel sesuai pencarian data
        $artikel = DB::table('artikel')
        ->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'artikel.id_ktg')
        ->where('judul','like',"%".$cari."%")
        ->where('status','=','tampil')
        ->paginate(2,['*'], 'cariartikel');
        $kategori_artikel = KatArtikel::all();

        //mengirim data artikel ke view artikel
        return view('frontend.artikel',compact('artikel','kategori_artikel'));
    }

    public function kategori(Request $request)
    {
        //Menangkap data pencarian
        $cari = $request->cari;

        //mengambul data dari tabel artikel sesuai pencarian data
        $artikel = DB::table('artikel')
        ->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'artikel.id_ktg')
        ->where('kategori_artikel.kategori_artikel',$cari)
        ->where('status','=','tampil')
        ->paginate(4, ['*'], 'kategoriartikel');
        $kategori_artikel = KatArtikel::all();

        //mengirim data artikel ke view artikel
        return view('frontend.artikel',compact('artikel','kategori_artikel'));
    }

    public function detail($id) {
        // $artikel2 = Artikel::orderBy('tanggal', 'desc')->paginate(2);
        $artikel2 = Artikel::join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'artikel.id_ktg')
        ->where('artikel.id_artikel','!=',$id)
        ->paginate(2);
        $artikel = DB::table('artikel')->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'artikel.id_ktg')->where('id_artikel',$id)->first();
        $kategori_artikel = KatArtikel::all();
        return view('frontend.detailartikel',compact('artikel','artikel2','kategori_artikel'));
    }

}
