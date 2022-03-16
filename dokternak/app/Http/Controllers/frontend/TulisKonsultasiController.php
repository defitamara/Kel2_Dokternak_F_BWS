<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Dokter as ModelsDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Models\KatHewan;
use App\Models\Konsultasi;
use App\Models\PeternakUser;
use App\Models\Petugas;
use App\Models\RiwayatKonsultasi;
use App\Models\Dokter;
use App\Models\KatArtikel;
use App\Models\DokterUser;

class TulisKonsultasiController extends Controller
{
    public function index()
    {
        $petugas = DB::table('dokter')->join('jabatan', 'jabatan.id_jabatan', '=', 'dokter.id_jabatan')->get();
        $kategori_hewan = KatHewan::all();
        $kategori_artikel = DB::table('kategori_artikel')->orderBy('id_ktg','asc')->get();
        return view('frontend.tuliskonsultasi',compact('petugas','kategori_artikel','kategori_hewan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal 15 huruf!!!',
            'max' => ':attribute URL harus diisi maksimal 100 huruf!!!',
            'mimes' => ':attribute harus berupa gambar dengan format (JPEG, PNG, dan SVG)',
        ];

        $idu = $request->id_peternak;
        $idk = $request->id_ktg;      


        $peternak = PeternakUser::where('id', $idu)->first();
        // $petugasi = DokterUser::where('nama_dokter', $idp)->first();
        $kategori = KatArtikel::where('kategori_artikel', $idk)->first();

        $id_peternak2 = $peternak->id_peternak;
        $id_katArtikel2 = $kategori->id_ktg;


        $data_simpan = [
            'id_ktg' => $id_katArtikel2,
            'id_peternak' => $id_peternak2,
            'id_dokter' => $request->id_dokter,
            'id_kategori' => $request->id_kategori,
            'tanggal' => $request->tanggal,
            'nama_hewan' => $request->nama_hewan,
            'keluhan' => $request->keluhan,
            'status_kirim' => $request->status_kirim,
        ];

        Konsultasi::create($data_simpan);

        return redirect()->route('tuliskonsultasi.index')
                        ->with('success','Konsultasi berhasil terkirim dimohon untuk menunggu respon dari Petugas');
    }
}
