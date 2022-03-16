<?php

namespace App\Http\Controllers\penyuluh;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Penyuluh;
use App\Models\Konsultasi;
use App\Models\PeternakUser;
use App\Models\RiwayatKonsultasi;
use App\Models\ResponKonsultasi;
use Illuminate\Support\Facades\Auth;

// BELUM SELESAI SEPENUHNYA, MENUNGGU KONSULTASI SELESAI

class ResponKonsultasiController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        // $petugas = DokterUser::where('id', $id)->first();
        $penyuluh = DB::table('penyuluh')->where('id',$id)->first();
        $id_penyuluh = $penyuluh->id_penyuluh;

        // $konsultasi = Konsultasi::select('konsultasi.*','dokter.*','peternak.*')
        //             ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
        //             ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
        //             ->where('konsultasi.id_dokter',$id_dokter)
        //             ->orderBy('tanggal','desc')
        //             ->where('konsultasi.status_kirim','=','norespon')
        //             ->get();

        $konsultasi = Konsultasi::select('konsultasi.*','dokter.*','peternak.*')
                    ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
                    ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
                    ->where('konsultasi.id_dokter',$id_dokter)
                    ->where('konsultasi.status_kirim','=','norespon')
                    ->orderBy('tanggal','desc')
                    ->get();

        $riwayat_konsultasi = RiwayatKonsultasi::select('riwayat_konsultasi.*','respon_konsultasi.*','konsultasi.*','dokter.*','peternak.*')
                    ->join('respon_konsultasi', 'respon_konsultasi.id_respon', '=', 'riwayat_konsultasi.id_respon')
                    ->join('konsultasi', 'konsultasi.id_konsultasi', '=', 'riwayat_konsultasi.id_konsultasi')
                    ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
                    ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
                    ->where('respon_konsultasi.id_dokter',$id_dokter)
                    ->orderBy('tanggal','desc')
                    ->get();
        return view('petugas.responkonsultasi',compact('konsultasi','riwayat_konsultasi'));
    }

    public function detail($id) {
        $idu = Auth::id();
        $petugas = DB::table('dokter')->where('id',$idu)->first();
        $id_dokter = $petugas->id_dokter;

        $konsultasi = Konsultasi::select('konsultasi.*','dokter.*','peternak.*')
                    ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
                    ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
                    ->where('konsultasi.id_dokter',$id_dokter)
                    ->where('konsultasi.status_kirim','=','norespon')
                    ->orderBy('tanggal','desc')
                    ->get();

        $riwayat_konsultasi = RiwayatKonsultasi::select('riwayat_konsultasi.*','respon_konsultasi.*','konsultasi.*','dokter.*','peternak.*')
                    ->join('respon_konsultasi', 'respon_konsultasi.id_respon', '=', 'riwayat_konsultasi.id_respon')
                    ->join('konsultasi', 'konsultasi.id_konsultasi', '=', 'riwayat_konsultasi.id_konsultasi')
                    ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
                    ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
                    ->where('konsultasi.id_dokter',$id_dokter)
                    ->orderBy('tanggal','desc')
                    ->get();

        $riwayat_konsultasi2 = RiwayatKonsultasi::select('riwayat_konsultasi.*','respon_konsultasi.*','konsultasi.*','dokter.*','peternak.*','kategori_artikel.*','kategori_hewan.*')
                    ->join('respon_konsultasi', 'respon_konsultasi.id_respon', '=', 'riwayat_konsultasi.id_respon')
                    ->join('konsultasi', 'konsultasi.id_konsultasi', '=', 'riwayat_konsultasi.id_konsultasi')            
                    ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
                    ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
                    ->join('kategori_hewan', 'kategori_hewan.id_kategori', '=', 'konsultasi.id_kategori')
                    ->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'konsultasi.id_ktg')
                    ->where('konsultasi.id_dokter',$id_dokter)
                    ->where('riwayat_konsultasi.id_riwayat',$id)
                    ->orderBy('tanggal','desc')
                    ->get();

        $konsultasi2 = Konsultasi::select('konsultasi.*','dokter.*','peternak.*','kategori_artikel.*','kategori_hewan.*')
                    ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
                    ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
                    ->join('kategori_hewan', 'kategori_hewan.id_kategori', '=', 'konsultasi.id_kategori')
                    ->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'konsultasi.id_ktg')
                    ->where('konsultasi.id_dokter',$id_dokter)
                    ->where('konsultasi.id_konsultasi',$id)
                    ->where('konsultasi.status_kirim','=','norespon')
                    ->orderBy('tanggal','desc')
                    ->get();

        return view('petugas.responkonsultasi',compact('konsultasi2','konsultasi','riwayat_konsultasi','riwayat_konsultasi2'));
    }

    public function detailterkirim($id) {
        $idu = Auth::id();
        $petugas = DB::table('dokter')->where('id',$idu)->first();
        $id_dokter = $petugas->id_dokter;

        
        $konsultasi = Konsultasi::select('konsultasi.*','dokter.*','peternak.*')
                    ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
                    ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
                    ->where('konsultasi.id_dokter',$id_dokter)
                    ->where('konsultasi.status_kirim','=','norespon')
                    ->orderBy('tanggal','desc')
                    ->get();

        $riwayat_konsultasi = RiwayatKonsultasi::select('riwayat_konsultasi.*','respon_konsultasi.*','konsultasi.*','dokter.*','peternak.*')
                    ->join('respon_konsultasi', 'respon_konsultasi.id_respon', '=', 'riwayat_konsultasi.id_respon')
                    ->join('konsultasi', 'konsultasi.id_konsultasi', '=', 'riwayat_konsultasi.id_konsultasi')
                    ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
                    ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
                    ->where('konsultasi.id_dokter',$id_dokter)
                    ->orderBy('tanggal','desc')
                    ->get();

        $riwayat_konsultasi2 = RiwayatKonsultasi::select('riwayat_konsultasi.*','respon_konsultasi.*','konsultasi.*','dokter.*','peternak.*','kategori_artikel.*','kategori_hewan.*')
                    ->join('respon_konsultasi', 'respon_konsultasi.id_respon', '=', 'riwayat_konsultasi.id_respon')
                    ->join('konsultasi', 'konsultasi.id_konsultasi', '=', 'riwayat_konsultasi.id_konsultasi')            
                    ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
                    ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
                    ->join('kategori_hewan', 'kategori_hewan.id_kategori', '=', 'konsultasi.id_kategori')
                    ->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'konsultasi.id_ktg')
                    ->where('konsultasi.id_dokter',$id_dokter)
                    ->where('riwayat_konsultasi.id_riwayat',$id)
                    ->orderBy('tanggal','desc')
                    ->get();

        return view('petugas.responkonsultasi',compact('riwayat_konsultasi','riwayat_konsultasi2','konsultasi'));
    }

    public function store(Request $request)
    {
        $kode = date('Yhi');
        $tanggal = date('Y-m-d');

        $status = 'terespon';

        $data_simpan = [
            'status_kirim' => $status,
        ];

        $data_simpan2 = [
            'id_respon' => $kode,
            'id_dokter' => $request->id_dokter,
            'respon' => $request->respon,
            'tanggal_respon' => $tanggal,
        ];

        $data_simpan3 = [
            'id_konsultasi' => $request->id_konsultasi,
            'id_respon' => $kode,
        ];

        Konsultasi::where('id_konsultasi', $request->id_konsultasi)->update($data_simpan);
        ResponKonsultasi::create($data_simpan2);
        RiwayatKonsultasi::create($data_simpan3);

        return redirect()->route('respon.index')
                        ->with('success','Respon Anda berhasil dikirim');
    }

    public function hapusterkirim($id,$idk)
    {
        RiwayatKonsultasi::where('id_riwayat',$id)->delete();
        ResponKonsultasi::where('id_respon',$idk)->delete();
        return redirect()->route('respon.index')
                        ->with('success','Pesan terkirim telah berhasil dihapus');
    }
}
