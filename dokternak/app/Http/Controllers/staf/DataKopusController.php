<?php

namespace App\Http\Controllers\staf;

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
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        $dtkopus = DB::table('koordinator_puskeswan')
            ->join('puskeswan','puskeswan.id_puskeswan','=','koordinator_puskeswan.id_puskeswan')
            ->select('koordinator_puskeswan.id_kp','koordinator_puskeswan.nama_kp','koordinator_puskeswan.jabatan','koordinator_puskeswan.jenis_kelamin',
            'koordinator_puskeswan.telpon','koordinator_puskeswan.alamat','koordinator_puskeswan.foto','puskeswan.nama_puskeswan','koordinator_puskeswan.id')
            ->get();
        return view('staf.dt_kopus.index', compact('dtkopus','staf'));
    }

    public function cetak_pdf()
    {
        $dtkopus = DB::table('koordinator_puskeswan')
            ->join('puskeswan','puskeswan.id_puskeswan','=','koordinator_puskeswan.id_puskeswan')
            ->get();
    	$pdf = PDF::loadview('staf/dt_kopus/cetak_pdf',['dtkopus'=>$dtkopus]);
    	return view('staf.dt_kopus.cetak_pdf',compact('dtkopus'));
    }

    public function create()
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        $puskeswan = Puskeswan::all();
        return view('staf.dt_kopus.create',compact('staf','puskeswan'));
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

        return redirect()->route('dt_kopus.index')
                        ->with('success','Data koordinator puskeswan baru telah berhasil disimpan');

    }

    public function edit($id)
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        $dtkopus = KoordinatorPuskeswan::where('id_kp',$id)->first();
        $puskeswan = Puskeswan::all();
        return view('staf.dt_kopus.edit',compact('dtkopus','staf','puskeswan'));
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

        return redirect()->route('dt_kopus.index')
                        ->with('success','Data koordinator puskeswan telah berhasil diperbarui');

    }

    public function detail($id)
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        $dtkopus = KoordinatorPuskeswan::orderBy('id_kp','asc')
                   ->join('puskeswan','puskeswan.id_puskeswan','=','koordinator_puskeswan.id_puskeswan')
                   ->where('id_kp',$id)
                   ->select('koordinator_puskeswan.id_kp','koordinator_puskeswan.nama_kp','koordinator_puskeswan.jabatan','koordinator_puskeswan.jenis_kelamin',
                    'koordinator_puskeswan.telpon','koordinator_puskeswan.alamat','koordinator_puskeswan.foto','puskeswan.nama_puskeswan')
                   ->get();
        return view('staf.dt_kopus.detail',compact('dtkopus','staf'));
    }

    public function destroy($id)
    {
        $dtkopus = KoordinatorPuskeswan::where('id_kp',$id)->delete();
        return redirect()->route('dt_kopus.index')
                        ->with('success','Data koordinator puskeswan telah berhasil dihapus');
    }
}
