<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\Pegawai;
use App\Models\Pelanggan;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tb_user',
            'no_hp' => 'required|numeric|max:9999999999999',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $unique_email = User::withTrashed()->where([
            'email' => $req->email
        ])->get();
        if (count($unique_email) > 0) {
            return response()->json([
                'status' => false,
                'message' => 'Email sudah terdaftar',
                'data' => $req->email
            ]);
        }

        $arr_pelanggan = array(
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'no_hp' => $req->no_hp
        );
        $pelanggan = Pelanggan::create($arr_pelanggan);

        $hash = Hash::make($req->password);
        $arr_user = array(
            'email' => $req->email,
            'password' => $hash,
            'id_entitas' => $pelanggan->id_pelanggan
        );
        $user = User::create($arr_user);

        return response()->json([
            'status' => true,
            'message' => 'Registrasi berhasil',
            'data' => $user,
            'password' => $hash
        ]);
    }
    public function login(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::where([
            'email' => $req->email
        ])->first();
        
        if ($user) {
            if (Hash::check($req->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;

                return response()->json([
                    'status' => true,
                    'message' => 'Login berhasil',
                    'data' => array(
                        'user' => $user,
                        'token' => $token
                    )
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data yang anda masukkan salah atau tidak terdaftar',
                    'data' => null
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data yang anda masukkan salah atau tidak terdaftar',
                'data' => null
            ]);
        }
    }
}
