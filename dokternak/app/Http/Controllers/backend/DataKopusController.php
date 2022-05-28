<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Puskeswan;
use App\Models\KoordinatorPuskeswan;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class DataKopusController extends Controller
{
    public function index()
    {

        $data_kopus = DB::table('koordinator_puskeswan')
            ->join('puskeswan','puskeswan.id_puskeswan','=','koordinator_puskeswan.id_puskeswan')
            ->select('koordinator_puskeswan.id_kp','koordinator_puskeswan.nama_kp','koordinator_puskeswan.jabatan','koordinator_puskeswan.jenis_kelamin',
            'koordinator_puskeswan.telpon','koordinator_puskeswan.alamat','koordinator_puskeswan.foto','puskeswan.nama_puskeswan','koordinator_puskeswan.id')
            ->get();
        return view('backend.data_kopus.index', compact('data_kopus'));
    }

    public function cetak_pdf()
    {
        $data_kopus = DB::table('koordinator_puskeswan')
            ->join('puskeswan','puskeswan.id_puskeswan','=','koordinator_puskeswan.id_puskeswan')
            ->get();
    	$pdf = PDF::loadview('backend/data_kopus/cetak_pdf',['data_kopus'=>$data_kopus]);
    	return view('backend.data_kopus.cetak_pdf',compact('data_kopus'));
    }

    public function create()
    {

        $puskeswan = Puskeswan::all();
        return view('backend.data_kopus.create',compact('puskeswan'));
    }

    public function store(Request $request)
    {

        $message = [
            'numeric' => ':attributer harus diisi nomor.'
        ];

        $validator = FacadesValidator::make($request->all(),[
            // 'nama' => 'required|string|max:100',
            // 'tingkatan' => 'required|numeric',
        ], $message)->validate();

        $role = 4;
        $id = 0;

        $getimageName = time().'.'.$request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('data/data_kopus'), $getimageName);


        $data_simpan = [
            
            'nama_kp' => $request->nama,
            'jabatan' => $request->jabatan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telpon' => $request->telpon,
            'alamat' => $request->alamat,
            'foto' => $getimageName,
            'id_puskeswan' => $request->id_puskeswan,
            'id' => $id,
        ];

        KoordinatorPuskeswan::create($data_simpan);

        return redirect()->route('data_kopus.index')
                        ->with('success','Data koordinator puskeswan baru telah berhasil disimpan');

    }

    public function edit($id)
    {

        $data_kopus = KoordinatorPuskeswan::where('id_kp',$id)->first();
        $puskeswan = Puskeswan::all();
        return view('backend.data_kopus.edit',compact('data_kopus','puskeswan'));
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

        $gbr=$request->nama_gambar;
        
        if($request->has('foto')) {
            $getimageName = time().'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('data/data_kopus'), $getimageName);
        }else {
            $getimageName = $gbr;
        }

        // $id = 0;

        $data_simpan = [
            'nama_kp' => $request->nama,
            'jabatan' => $request->jabatan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telpon' => $request->telpon,
            'alamat' => $request->alamat,
            'foto' => $getimageName,
            'id' => $request->id,
        ];

        KoordinatorPuskeswan::where('id_kp', $id)->update($data_simpan);

        return redirect()->route('data_kopus.index')
                        ->with('success','Data koordinator puskeswan telah berhasil diperbarui');

    }

    public function detail($id)
    {
        $data_kopus = KoordinatorPuskeswan::orderBy('id_kp','asc')
                   ->join('puskeswan','puskeswan.id_puskeswan','=','koordinator_puskeswan.id_puskeswan')
                   ->where('id_kp',$id)
                   ->select('koordinator_puskeswan.id_kp','koordinator_puskeswan.nama_kp','koordinator_puskeswan.jabatan','koordinator_puskeswan.jenis_kelamin',
                    'koordinator_puskeswan.telpon','koordinator_puskeswan.alamat','koordinator_puskeswan.foto','puskeswan.nama_puskeswan')
                   ->get();
        return view('backend.data_kopus.detail',compact('data_kopus'));
    }

    public function destroy($id)
    {
        $data_kopus = KoordinatorPuskeswan::where('id_kp',$id)->delete();
        return redirect()->route('data_kopus.index')
                        ->with('success','Data koordinator puskeswan telah berhasil dihapus');
    }
}
