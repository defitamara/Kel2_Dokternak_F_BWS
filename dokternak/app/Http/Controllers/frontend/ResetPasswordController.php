<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ResetPasswordController extends Controller
{
    public function index(){

    return view('frontend.change-password');

    }

    public function changePassword()
    {
        
        return view('frontend.change-password');
    }
 
 
    public function updatePassword(ChangePasswordRequest $request)
    {
        $old_password = auth()->user()->password;
        $user_id = auth()->user()->id;

        if (Hash::check($request->input('oldpassword'), $old_password)){
            $user = User::find($user_id);

            // $user_password = Hash::make($request->input('password'));

            $data_simpan = [
                'password' =>  Hash::make($request->input('password')),
                
            ];
            
            $update_user = User::where('id', $user_id)->update($data_simpan);

            $sukses='Ganti password berhasil';

           if ($user->save()){
                // return redirect()->back()->with('success', 'Ganti password berhasil.');
                return $update_user;
           }else{
                return redirect()->back()->with('error', 'Password lama invalid.');

           }

        }else{
            return redirect()->back()->with('error', 'Password lama invalid.');
        }
    }
}