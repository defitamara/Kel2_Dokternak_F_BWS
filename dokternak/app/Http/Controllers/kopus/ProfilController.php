<?php

namespace App\Http\Controllers\kopus;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KoordinatorPuskeswan;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $id = Auth::id();
        $user = User::where('id',$id)->first();
        $dtkopus = DB::table('koordinator_puskeswan')
            ->where('koordinator_puskeswan.id','=',$id)
            ->join('puskeswan','puskeswan.id_puskeswan','=','koordinator_puskeswan.id_puskeswan')
            ->select('koordinator_puskeswan.id_kp','koordinator_puskeswan.nama_kp','koordinator_puskeswan.jabatan','koordinator_puskeswan.jenis_kelamin',
            'koordinator_puskeswan.telpon','koordinator_puskeswan.alamat','koordinator_puskeswan.foto','puskeswan.nama_puskeswan','koordinator_puskeswan.id')
            ->get();
        return view('kopus.tabel_profil.index', compact('dtkopus'));
    }

    public function edit($id)
    {
        $kopus = DB::table('users')
            ->join('koordinator_puskeswan','koordinator_puskeswan.id','=','users.id')
            ->join('puskeswan','puskeswan.id_puskeswan','=','koordinator_puskeswan.id_puskeswan')
            ->get();
        $dtkopus = KoordinatorPuskeswan::where('id_kp',$id)->first();

        return view('kopus.tabel_profil.edit',compact('dtkopus','kopus'));
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

        $data_simpan = [
            'nama_kp' => $request->nama,
            'jabatan' => $request->jabatan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telpon' => $request->telpon,
            'alamat' => $request->alamat,
            'foto' => $getimageName,
        ];

        KoordinatorPuskeswan::where('id_kp', $id)->update($data_simpan);

        return redirect()->route('tabel_profil.index')
                        ->with('success','Profil anda telah berhasil diperbarui');

    }

}
