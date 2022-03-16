<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request,
App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $id = Auth::id();
        $user = User::where('id',$id)->first();

        $role = $user->is_admin;

        return $role;

        if ($role == 1) {
            return view('backend.dashboard');
        }
        elseif ($role  == 2) {
            return redirect()->route('lppetugas');
        }elseif($role  == 0) {
            return redirect()->route('home');
        }
    }
}
