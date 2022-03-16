<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\peternak;
use App\Models\PeternakUser;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use DateTime;
use App\Models\User;

class ApiUsersController extends Controller
{
    public function getAll() 
    {
        $peternak = Peternak::all();
        return response()->json($peternak, 201);
    }

    public function getUsers($id) 
    {
        $peternak = Peternak::find($id);
        return response()->json($peternak, 200);
    }

    public function createUsers(Request $request) 
    {
        Peternak::create($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Peternak Berhasil Ditambahkan!'
        ], 201);
    }

    public function updateUsers($id, Request $request) 
    {
        Peternak::find($id)->update($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Peternak Berhasil Dirubah!'
        ], 201);
    }

    public function deleteUsers($id) 
    {
        Peternak::destroy($id);

        return response()->json([
            'status' => 'ok',
            'message' => 'Peternak Berhasil Dihapus!'
        ], 201);
    }

    public function loginUser(Request $request){
        $user =  Peternak::where('email',$request->email)->first();
        // if ($user) {
        //     if (password_verify($request->password,$user->password)) {
        //         return response()->json([
        //             'success' => 1,
        //             'message' => 'Selamat Datang '.$user->name,
        //             'user' => $user
        //         ]);
        //     }
        //     return $this->error('Password Salah');
        // } else {
        //     return $this->error('Email tidak terdaftar');
        // }

        $user = User::where('email',$request->email)
        ->where('is_admin',0)            
        ->first();

        $password_user = $user->password;

        // if(!$user || !Hash::check($request->password, $password_user)){
        //     return response(
        //         [
        //             'status'=>401,
        //             'message' => 'Gagal Login!',
        //         ]
        //     ,401);
        // }else{
        //     $user_d = PeternakUser::select('users.*','peternak.*')
        //     ->join('users', 'users.id', '=', 'peternak.id')
        //     ->where("peternak.id",$user->id)->first();
        //     return response()->json([
        //         'status' => 'ok',
        //         'message' => 'login Berhasil!',
        //         'data' => $user_d,
        //     ], 200);
        // }

        if(!$user){
            if(!Hash::check($request->password, $password_user)){
                return response(
                    [
                        'status'=>402,
                        'message' => 'Gagal Login!, Email dan Password Salah',
                    ]
                ,402);
            }else{
                return response(
                    [
                        'status'=>401,
                        'message' => 'Gagal Login!, Password anda Benar, tetapi email Salah',
                    ]
                ,401);
            }
        
        }else{
            if(!Hash::check($request->password, $password_user)){
                return response(
                    [
                        'status'=>403,
                        'message' => 'Gagal Login!, Password Salah',
                    ]
                ,403);
            }else{
                $user_d = PeternakUser::select('users.*','peternak.*')
                ->join('users', 'users.id', '=', 'peternak.id')
                ->where("peternak.id",$user->id)->first();
                return response()->json([
                    'status' => 'ok',
                    'message' => 'login Berhasil!',
                    'data' => $user_d,
                ], 200);
            }
        }
    }

    public function registerUser(Request $request){
        $validasi = validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8'
        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $user = Peternak::create(array_merge($request->all(), [
            'password' => bcrypt($request->password),
            'is_admin' => 0
        ]));

        $dt = new DateTime();
        $id_peternak=$dt->format('mdHis ');

        $id_user = $user->id;
        $nama_user = $user->name;
        $email_user = $user->email;
        $fotodefault = 'default.jpg';

        $peternak = PeternakUser::create([
            'id_peternak' => $id_peternak,
            'namadepan_peternak' => $nama_user,
            'namabelakang_peternak' => '',
            'no_hp' => '',
            'jenis_kelamin' => '',
            'alamat' => '',
            'foto_peternak' => $fotodefault,
            'email_peternak' => $email_user,
            'id' => $id_user,
        ]);

        if ($user) {
            return response()->json([
                'success' => 1,
                'message' => 'Selamat, Registrasi Anda Berhasil!',
                'user' => $peternak,
            ]);
        }
        return $this->error('Registrasi Gagal');
    }

    public function error($pesan){
        return response()->json([
            'success' => 0,
            'message' => $pesan
        ]);
    }

    public function updateProfile(Request $request, $id){
        
        $gbr=$request->nama_gambar;
        // if (isset($request->gambar) == NULL){
        if($request->has('foto_peternak')) {
            $getimageName = time().'.'.$request->foto_peternak->getClientOriginalExtension();
            $request->foto_peternak->move(public_path('data/data_peternak'), $getimageName);
        }else {
            $getimageName = $gbr;
        }
        
        $data_simpan = [
            'namadepan_peternak' => $request->name,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'foto_peternak' => $getimageName,
            'email_peternak' => $request->email,
        ];

        $data_simpan2 = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        PeternakUser::where('id', $id)->update($data_simpan);

        User::where('id', $id)->update($data_simpan2);

        $user_d = PeternakUser::select('users.*','peternak.*')
        ->join('users', 'users.id', '=', 'peternak.id')
        ->where("peternak.id",$id)->first();

        return response()->json([
            'status' => 'ok',
            'message' => 'Update profile berhasil',
            'data' => $user_d,
        ], 200);
        
    }
}
