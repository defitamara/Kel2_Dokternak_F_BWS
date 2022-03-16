<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi;
use App\Models\PeternakUser;
use App\Models\ResponKonsultasi;
use App\Models\RiwayatKonsultasi;
use Illuminate\Support\Facades\DB;

class ApiKonsultasiController extends Controller
{
    // public function getTerkirim() 
    // {
    //     $konsultasi = Konsultasi::select('konsultasi.*','dokter.*','peternak.*')
    //             ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
    //             ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
    //             ->where('konsultasi.status_kirim','norespon')
    //             ->orderBy('tanggal','desc')
    //             ->get();
    //     return response()->json([
    //         'status' => 'ok',
    //         'message' => 'Konsultasi terkirim Berhasil Ditampilkan Semua',
    //         'data' => $konsultasi
    //     ], 201);
    // }

    public function getDetailTerkirim($id_konsultasi) 
    {
        $konsultasi = Konsultasi::select('konsultasi.*','dokter.*','peternak.*','kategori_artikel.*','kategori_hewan.*')
                ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
                ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
                ->join('kategori_hewan', 'kategori_hewan.id_kategori', '=', 'konsultasi.id_kategori')
                ->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'konsultasi.id_ktg')
                ->where('konsultasi.id_konsultasi',$id_konsultasi)
                ->orderBy('tanggal','desc')
                ->first();
        return response()->json([
            'status' => 'ok',
            'message' => 'Detail Konsultasi Berhasil Ditampilkan per-item',
            'data' => $konsultasi
        ], 200);
    }

    // public function getMasuk(){
    //     $riwayat_konsultasi = RiwayatKonsultasi::select('riwayat_konsultasi.*','respon_konsultasi.*','konsultasi.*','dokter.*','peternak.*')
    //             ->join('respon_konsultasi', 'respon_konsultasi.id_respon', '=', 'riwayat_konsultasi.id_respon')
    //             ->join('konsultasi', 'konsultasi.id_konsultasi', '=', 'riwayat_konsultasi.id_konsultasi')
    //             ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
    //             ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
    //             ->orderBy('tanggal','desc')
    //             ->get();
    //     return response()->json([
    //         'status' => 'ok',
    //         'message' => 'Konsultasi Masuk Berhasil Ditampilkan per-item',
    //         'data' => $riwayat_konsultasi
    //     ], 200);
    // }

    public function getDetailMasuk($id_riwayat){
        $riwayat_konsultasi = RiwayatKonsultasi::select('riwayat_konsultasi.*','respon_konsultasi.*','konsultasi.*','dokter.*','peternak.*','kategori_artikel.*','kategori_hewan.*')
                ->join('respon_konsultasi', 'respon_konsultasi.id_respon', '=', 'riwayat_konsultasi.id_respon')
                ->join('konsultasi', 'konsultasi.id_konsultasi', '=', 'riwayat_konsultasi.id_konsultasi')            
                ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
                ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
                ->join('kategori_hewan', 'kategori_hewan.id_kategori', '=', 'konsultasi.id_kategori')
                ->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'konsultasi.id_ktg')
                ->where('riwayat_konsultasi.id_riwayat',$id_riwayat)
                ->orderBy('tanggal','desc')
                ->first();
        return response()->json([
            'status' => 'ok',
            'message' => 'Detail Konsultasi Masuk Berhasil Ditampilkan per-item',
            'data' => $riwayat_konsultasi
        ], 200);
    }

    public function getTerkirim($id) 
    {
        // $artikel = Artikel::all();
        $konsultasi = Konsultasi::select('konsultasi.*','dokter.*','peternak.*')
                ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
                ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
                ->where('konsultasi.id_peternak',$id)
                ->where('konsultasi.status_kirim','norespon')
                ->orderBy('tanggal','desc')
                ->get();
        return response()->json([
            'status' => 'ok',
            'message' => 'Konsultasi terkirim Berhasil Ditampilkan Semua',
            'data' => $konsultasi
        ], 201);
    }

    // public function getDetailTerkirim($id_peternak, $id) 
    // {
    //     $konsultasi = Konsultasi::select('konsultasi.*','dokter.*','peternak.*','kategori_artikel.*','kategori_hewan.*')
    //             ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
    //             ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
    //             ->join('kategori_hewan', 'kategori_hewan.id_kategori', '=', 'konsultasi.id_kategori')
    //             ->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'konsultasi.id_ktg')
    //             ->where('konsultasi.id_peternak',$id_peternak)
    //             ->where('konsultasi.id_konsultasi',$id)
    //             ->orderBy('tanggal','desc')
    //             ->get();
    //     return response()->json([
    //         'status' => 'ok',
    //         'message' => 'Detail Konsultasi Berhasil Ditampilkan per-item',
    //         'data' => $konsultasi
    //     ], 200);
    // }

    public function getMasuk($id){
    
        $riwayat_konsultasi = RiwayatKonsultasi::select('riwayat_konsultasi.*','respon_konsultasi.*','konsultasi.*','dokter.*','peternak.*')
                ->join('respon_konsultasi', 'respon_konsultasi.id_respon', '=', 'riwayat_konsultasi.id_respon')
                ->join('konsultasi', 'konsultasi.id_konsultasi', '=', 'riwayat_konsultasi.id_konsultasi')
                ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
                ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
                ->where('konsultasi.id_peternak',$id)
                ->orderBy('tanggal','desc')
                ->get();
        return response()->json([
            'status' => 'ok',
            'message' => 'Konsultasi Masuk Berhasil Ditampilkan per-item',
            'data' => $riwayat_konsultasi
        ], 200);
    }

    // public function getDetailMasuk($id_peternak, $id){
    //     $riwayat_konsultasi = RiwayatKonsultasi::select('riwayat_konsultasi.*','respon_konsultasi.*','konsultasi.*','dokter.*','peternak.*','kategori_artikel.*','kategori_hewan.*')
    //             ->join('respon_konsultasi', 'respon_konsultasi.id_respon', '=', 'riwayat_konsultasi.id_respon')
    //             ->join('konsultasi', 'konsultasi.id_konsultasi', '=', 'riwayat_konsultasi.id_konsultasi')            
    //             ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
    //             ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
    //             ->join('kategori_hewan', 'kategori_hewan.id_kategori', '=', 'konsultasi.id_kategori')
    //             ->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'konsultasi.id_ktg')
    //             ->where('konsultasi.id_peternak',$id_peternak)
    //             ->where('riwayat_konsultasi.id_riwayat',$id)
    //             ->orderBy('tanggal','desc')
    //             ->get();
    //     return response()->json([
    //         'status' => 'ok',
    //         'message' => 'Detail Konsultasi Masuk Berhasil Ditampilkan per-item',
    //         'data' => $riwayat_konsultasi
    //     ], 200);
    // }

    public function tulisKonsultasi(Request $request) 
    {
        Konsultasi::create($request->all());
        return response()->json([
            'status' => 'ok',
            'message' => 'Konsultasi Berhasil Ditambahkan!'
        ], 201);
    }

    public function deleteKonsultasi($id_konsultasi) 
    {
        Konsultasi::destroy($id_konsultasi);

        return response()->json([
            'status' => 'ok',
            'message' => 'Konsultasi Berhasil Dihapus!'
        ], 201);
    }

    public function hapusmasuk($id_konsultasi)
    {
        $riwayat_konsultasi = RiwayatKonsultasi::where('id_konsultasi',$id_konsultasi)->first();
        $id_respon2 = $riwayat_konsultasi->id_respon;
        $id_riwayat2 = $riwayat_konsultasi->id_riwayat;
        RiwayatKonsultasi::destroy($id_riwayat2);
        Konsultasi::destroy($id_konsultasi);
        ResponKonsultasi::destroy($id_respon2);
        return response()->json([
            'status' => 'ok',
            'message' => 'Konsultasi Berhasil Dihapus!'
        ], 201);
    }
    
}
