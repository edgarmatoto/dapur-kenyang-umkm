<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginUserController extends Controller
{
     public function index(){
        if (session()->has('login_user')){
                return redirect('/');
            }

        return view('LoginBlade.loginuser');
        }

     public function login_aksi(Request $request){
        if (session()->has('login_user')){
                return redirect('/');
            }

        $cekuser = DB::table('user_login')
                        ->where('email', $request->email)
                        ->first();

        if($cekuser && Hash::check($request->password, $cekuser->password)){
            //cek user
            $user = [
                'id_user' => $cekuser->id_user,
                'email' => $cekuser->email,
                'password' => $cekuser->password
            ];

            session(['login_user' => $user]);

            return redirect('/')->with('toast_success', 'Login Berhasil!');

        }else{
            return redirect()->back()->withWarning('User Tidak Valid');
        }
    }

     public function logout(){
        // session::flush();
        session::forget('login_user');
        session::save();

        return redirect('/');
    }
}
