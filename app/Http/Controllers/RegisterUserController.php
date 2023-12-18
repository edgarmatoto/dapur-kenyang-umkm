<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use App\Models\Loginuser;
use Exception;

class RegisterUserController extends Controller
{
      public function register(){
        return view('LoginBlade.registeruser');
    }

     public function register_aksi(Request $request){
        try {
            DB::table('user_login')
                ->insert([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'confir' => Hash::make($request->confir),
                ]);

            return redirect('/register')->with('success', 'Daftar Akun Berhasil!');

        }catch (Exception $exception) {
        return back()->withError($exception->getMessage())->withInput();
        }
    }
}

