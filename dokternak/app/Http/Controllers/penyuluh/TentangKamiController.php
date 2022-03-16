<?php

namespace App\Http\Controllers\penyuluh;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kritikdansaran;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class TentangKamiController extends Controller
{
    public function index()
    {
        // $peternak = DB::table('peternak')->get();
        // return view('backend.peternak.index',compact('peternak')); 
        return view('penyuluh.tentangkami');
    }

    public function store(Request $request)
    {

        $message = [
            'numeric' => ':attributer harus diisi nomor.'
        ];

        $validator = FacadesValidator::make($request->all(),[
            // 'judul_tutorial' => 'required|string|min:15|max:100',
            // 'icon' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ], $message)->validate();


        $data_simpan = [
            'nama' => $request->nama,
            'komentar' => $request->komentar,
            'tanggal' => $request->tanggal,
            'email_hp' => $request->email_hp,
            'pekerjaan' => $request->pekerjaan,
        ];

        kritikdansaran::create($data_simpan);

        return redirect()->back()->with('success','Terima kasih, kritik dan saran berhasil dikirim!');
    }
}
