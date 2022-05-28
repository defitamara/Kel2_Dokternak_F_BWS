<?php

namespace App\Http\Controllers\staf;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Models\KoordinatorPuskeswan;
use App\Models\Role;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;

class DataUserKopusController extends Controller
{
    public function index()
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        $data = KoordinatorPuskeswan::select('koordinator_puskeswan.*', 'users.*')
            ->join('users', 'users.id', '=', 'koordinator_puskeswan.id') 
            ->where('koordinator_puskeswan.id','!=',0)
            ->get();

        return view('staf.dt_user_kopus.index',compact('data','staf'));
    }

    public function cetak_pdf()
    {
        $dtkopus = KoordinatorPuskeswan::select('koordinator_puskeswan.*', 'users.*')
            ->join('users', 'users.id', '=', 'koordinator_puskeswan.id') 
            ->where('koordinator_puskeswan.id','!=',0)
            ->get();
    	$pdf = PDF::loadview('staf/dt_user_kopus/cetak_pdf',['dtkopus'=>$dtkopus]);
    	return view('staf.dt_user_kopus.cetak_pdf',compact('dtkopus'));
    }

    public function create()
    {
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();

        $kopus = KoordinatorPuskeswan::select('koordinator_puskeswan.*')
            ->where('id',0)
            ->get();

        return view('staf.dt_user_kopus.create',compact('kopus','staf'));
    }

    public function store(Request $request)
    {

        $nama = $request->nama_kp;  

        $role = 4;
        $user = User::create([
            'name' =>$nama,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $role,

        ]);

        $id_user = $user->id;

        $message = [
            'required' => ':attribute wajib diisi!!!',
            'min' => ':attribute harus diisi minimal 15 huruf!!!',
            'max' => ':attribute URL harus diisi maksimal 100 huruf!!!',
            'mimes' => ':attribute harus berupa gambar dengan format (JPEG, PNG, dan SVG)',
        ];

        $validator = FacadesValidator::make($request->all(),[
            'email' => 'required|string|max:40',
        ], $message)->validate();


        $data_simpan = [
            'id' => $id_user,
        ];

        KoordinatorPuskeswan::where('nama_kp', $nama)->update($data_simpan);

        return redirect()->route('dt_user_kopus.index')
                        ->with('success','Data koordinator puskeswan baru telah berhasil disimpan');
    }

    public function edit($id)
    {

        $data = KoordinatorPuskeswan::select('koordinator_puskeswan.*','users.*')
        ->join('users', 'users.id', '=', 'koordinator_puskeswan.id') 
        ->where('koordinator_puskeswan.id', $id)->first();

        $kopus = KoordinatorPuskeswan::select('koordinator_puskeswan.*')
            ->where('id','!=',0)
            ->get();
        
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        return view('staf.dt_user_kopus.edit',compact('data','kopus','staf'));
    }

    public function update(Request $request, $id)
    {
        $nama = $request->name;  

        $message = [
            'numeric' => ':attributer harus diisi nomor.'
        ];

        $validator = FacadesValidator::make($request->all(),[
            'email' => 'required|string|max:40',
        ], $message)->validate();

        $data_update = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        User::where('id', $id)->update($data_update);


        return redirect()->route('dt_user_kopus.index')
                        ->with('success','Data koordinator puskeswan telah berhasil diperbarui');
    }

    public function ubahpw($id)
    {
        $data = KoordinatorPuskeswan::select('koordinator_puskeswan.*','users.*')
        ->join('users', 'users.id', '=', 'koordinator_puskeswan.id') 
        ->where('koordinator_puskeswan.id', $id)->first();
        
        $staf = DB::table('users')->join('staf_it','staf_it.id','=','users.id')
            ->get();
        
        return view('staf.dt_user_kopus.ubahpw',compact('data','staf'));
    }

    public function ubahpassword(Request $request, $id)
    {
        $message = [
            'numeric' => ':attributer harus diisi nomor.'
        ];

        $validator = FacadesValidator::make($request->all(),[
            'password' => 'required|string|max:40',
        ], $message)->validate();

        $data_update = [
            'password' => Hash::make($request->input('password')),
        ];

        User::where('id', $id)->update($data_update);

        return redirect()->route('dt_user_kopus.index')
                        ->with('success','Password Akun Koordinator telah berhasil dirubah');
    }

    public function destroy($id)
    {
        $admin = User::where('id',$id)->delete();

        // Mengubah id di data dokter menjadi 0, artinya tidak punya akun
        $hapusId = 0;
        $data_simpan = [
            'id' => $hapusId,
        ];

        KoordinatorPuskeswan::where('id', $id)->update($data_simpan);

        return redirect()->route('dt_user_kopus.index')
                        ->with('success','Data Koordinator Puskeswan telah berhasil dihapus');
    }
}