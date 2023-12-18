<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Loginuser;
use Exception;

class PasswordUserController extends Controller
{
     public function update(){
        return view('PasswordBlade.passworduser');
    }

     public function update_aksi(Request $request)
     {
       try {
            DB::table('user_login')
            ->where('id_user', $request->id_user)
                ->update([
                    'password' => $request->password,
                    'confir' => $request->confir,
                ]);

             return redirect('/reset-password')->with('success', 'Ubah Password Berhasil!');

        }catch (Exception $exception) {
        return back()->withError($exception->getMessage())->withInput();
        }
    }
}
