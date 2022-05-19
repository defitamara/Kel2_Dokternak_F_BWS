<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Staf_it;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class DataStafController extends Controller
{
    public function index()
    {
        $data_staf = DB::table('staf_it')
            ->get();
        return view('backend.data_staf.index', compact('data_staf'));
    }

    public function cetak_pdf()
    {
        $data_staf = DB::table('staf_it')
            ->get();
    	$pdf = PDF::loadview('backend.data_staf.cetak_pdf',['data_staf'=>$data_staf]);
    	return view('backend.data_staf.cetak_pdf',compact('data_staf'));
    }

    // Staf tidak bisa menambah data staf baru! Hanya admin yang bisa

    public function create()
    {
        return view('backend.data_staf.create');
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

        $role = 3;
        $id = 0;

        $getimageName = time().'.'.$request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('data/data_staf'), $getimageName);


        $data_simpan = [
            
            'nama_staf' => $request->nama,
            'jabatan' => $request->jabatan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telpon' => $request->telpon,
            'alamat' => $request->alamat,
            'foto' => $getimageName,
            'id' => $id,
        ];

        Staf_it::create($data_simpan);

        return redirect()->route('data_staf.index')
                        ->with('success','Data staf baru telah berhasil disimpan');

    }

    public function edit($id)
    {
        
        $data_staf = Staf_it::where('id_staf',$id)->first();
        return view('backend.data_staf.edit',compact('data_staf'));
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
            $request->foto->move(public_path('data/data_staf'), $getimageName);
        }else {
            $getimageName = $gbr;
        }

        $data_simpan = [
            'nama_staf' => $request->nama,
            'jabatan' => $request->jabatan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telpon' => $request->telpon,
            'alamat' => $request->alamat,
            'foto' => $getimageName,
        ];

        Staf_it::where('id_staf', $id)->update($data_simpan);

        return redirect()->route('data_staf.index')
                        ->with('success','Data staf telah berhasil diperbarui');

    }

    public function detail($id)
    {
        
        $data_staf = Staf_it::orderBy('id_staf','asc')
                   ->where('id_staf',$id)
                   ->get();
        return view('backend.data_staf.detail',compact('data_staf'));
    }

    public function destroy($id)
    {
        $data_staf = Staf_it::where('id_staf',$id)->delete();
        return redirect()->route('data_staf.index')
                        ->with('success','Data staf telah berhasil dihapus');
    }
}
