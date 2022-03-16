<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Konsultasi;
use App\Models\PeternakUser;
use App\Models\RiwayatKonsultasi;
use App\Models\ResponKonsultasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function index()
    {
        // $konsultasi = DB::table('konsultasi')
        // ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
        // ->where('konsultasi.id_peternak')
        // ->orderBy('tanggal','desc')
        // ->get();

        $id = Auth::id();
        $peternak = PeternakUser::where('id', $id)->first();
        $id_peternak = $peternak->id_peternak;

        $konsultasi = Konsultasi::select('konsultasi.*','dokter.*','peternak.*')
                    ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
                    ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
                    ->where('konsultasi.id_peternak',$id_peternak)
                    ->orderBy('tanggal','desc')
                    ->get();

        $riwayat_konsultasi = RiwayatKonsultasi::select('riwayat_konsultasi.*','respon_konsultasi.*','konsultasi.*','dokter.*','peternak.*')
                    ->join('respon_konsultasi', 'respon_konsultasi.id_respon', '=', 'riwayat_konsultasi.id_respon')
                    ->join('konsultasi', 'konsultasi.id_konsultasi', '=', 'riwayat_konsultasi.id_konsultasi')
                    ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
                    ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
                    ->where('konsultasi.id_peternak',$id_peternak)
                    ->orderBy('tanggal','desc')
                    ->get();

        return view('frontend.riwayatkonsultasi',compact('konsultasi','riwayat_konsultasi'));
        // return $konsultasi;
    }

    public function detail($id) {
        $idu = Auth::id();
        $peternak = PeternakUser::where('id', $idu)->first();
        $id_peternak = $peternak->id_peternak;

        $konsultasi = Konsultasi::select('konsultasi.*','dokter.*','peternak.*')
                    ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
                    ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
                    ->where('konsultasi.id_peternak',$id_peternak)
                    ->orderBy('tanggal','desc')
                    ->get();

        $riwayat_konsultasi = RiwayatKonsultasi::select('riwayat_konsultasi.*','respon_konsultasi.*','konsultasi.*','dokter.*','peternak.*')
                    ->join('respon_konsultasi', 'respon_konsultasi.id_respon', '=', 'riwayat_konsultasi.id_respon')
                    ->join('konsultasi', 'konsultasi.id_konsultasi', '=', 'riwayat_konsultasi.id_konsultasi')
                    ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
                    ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
                    ->where('konsultasi.id_peternak',$id_peternak)
                    ->orderBy('tanggal','desc')
                    ->get();

        $riwayat_konsultasi2 = RiwayatKonsultasi::select('riwayat_konsultasi.*','respon_konsultasi.*','konsultasi.*','dokter.*','peternak.*','kategori_artikel.*','kategori_hewan.*')
                    ->join('respon_konsultasi', 'respon_konsultasi.id_respon', '=', 'riwayat_konsultasi.id_respon')
                    ->join('konsultasi', 'konsultasi.id_konsultasi', '=', 'riwayat_konsultasi.id_konsultasi')            
                    ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
                    ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
                    ->join('kategori_hewan', 'kategori_hewan.id_kategori', '=', 'konsultasi.id_kategori')
                    ->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'konsultasi.id_ktg')
                    ->where('konsultasi.id_peternak',$id_peternak)
                    ->where('riwayat_konsultasi.id_riwayat',$id)
                    ->orderBy('tanggal','desc')
                    ->get();

        // $konsultasi2 = DB::table('konsultasi')
        // // ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
        // // ->join('kategori_hewan', 'kategori_hewan.id_kategori', '=', 'konsultasi.id_kategori')
        // // ->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'konsultasi.id_ktg')
        // ->where('konsultasi.id_konsultasi',$id)
        // ->get();

        // $konsultasi2 = Konsultasi::find($id);
        $konsultasi2 = Konsultasi::select('konsultasi.*','dokter.*','peternak.*','kategori_artikel.*','kategori_hewan.*')
                    ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
                    ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
                    ->join('kategori_hewan', 'kategori_hewan.id_kategori', '=', 'konsultasi.id_kategori')
                    ->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'konsultasi.id_ktg')
                    ->where('konsultasi.id_peternak',$id_peternak)
                    ->where('konsultasi.id_konsultasi',$id)
                    ->orderBy('tanggal','desc')
                    ->get();

        return view('frontend.riwayatkonsultasi',compact('konsultasi2','konsultasi','riwayat_konsultasi','riwayat_konsultasi2'));
        // return $konsultasi2;
    }

    public function detailmasuk($id, $idk) {
        $idu = Auth::id();
        $peternak = PeternakUser::where('id', $idu)->first();
        $id_peternak = $peternak->id_peternak;

        $status = 'terespon';

        $data_simpan = [
            'status_kirim' => $status,
        ];

        Konsultasi::where('id_konsultasi', $idk)->update($data_simpan);

        $konsultasi = Konsultasi::select('konsultasi.*','dokter.*','peternak.*')
                    ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
                    ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
                    ->where('konsultasi.id_peternak',$id_peternak)
                    ->orderBy('tanggal','desc')
                    ->get();

        $riwayat_konsultasi = RiwayatKonsultasi::select('riwayat_konsultasi.*','respon_konsultasi.*','konsultasi.*','dokter.*','peternak.*')
                    ->join('respon_konsultasi', 'respon_konsultasi.id_respon', '=', 'riwayat_konsultasi.id_respon')
                    ->join('konsultasi', 'konsultasi.id_konsultasi', '=', 'riwayat_konsultasi.id_konsultasi')
                    ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
                    ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
                    ->where('konsultasi.id_peternak',$id_peternak)
                    ->orderBy('tanggal','desc')
                    ->get();

        $riwayat_konsultasi2 = RiwayatKonsultasi::select('riwayat_konsultasi.*','respon_konsultasi.*','konsultasi.*','dokter.*','peternak.*','kategori_artikel.*','kategori_hewan.*')
                    ->join('respon_konsultasi', 'respon_konsultasi.id_respon', '=', 'riwayat_konsultasi.id_respon')
                    ->join('konsultasi', 'konsultasi.id_konsultasi', '=', 'riwayat_konsultasi.id_konsultasi')            
                    ->join('dokter', 'dokter.id_dokter', '=', 'konsultasi.id_dokter')
                    ->join('peternak', 'peternak.id_peternak', '=', 'konsultasi.id_peternak')
                    ->join('kategori_hewan', 'kategori_hewan.id_kategori', '=', 'konsultasi.id_kategori')
                    ->join('kategori_artikel', 'kategori_artikel.id_ktg', '=', 'konsultasi.id_ktg')
                    ->where('konsultasi.id_peternak',$id_peternak)
                    ->where('riwayat_konsultasi.id_riwayat',$id)
                    ->orderBy('tanggal','desc')
                    ->get();

        return view('frontend.riwayatkonsultasi',compact('riwayat_konsultasi','riwayat_konsultasi2','konsultasi'));
    }

    public function hapus($id)
    {
        Konsultasi::where('id_konsultasi',$id)->delete();
        return redirect()->route('konsultasi.detail')
                        ->with('success','Konsultasi telah berhasil dihapus');
    }

    public function hapusmasuk($id, $idk,$idr)
    {
        RiwayatKonsultasi::where('id_riwayat',$id)->delete();
        Konsultasi::where('id_konsultasi',$idk)->delete();
        ResponKonsultasi::where('id_respon',$idr)->delete();
        return redirect()->route('konsultasi.index')
                        ->with('success','Konsultasi telah berhasil dihapus');
    }

}
