<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        if(isset(Auth::user()->name)){ // Mengecek apakah dia sudah login apa belum
            if(Auth::user()->jabatan == 'Pelanggan'){ // Kalau sudah login, jabatannya dia Admin apa Pelanggan
                return redirect()->intended('/pelanggan'); // Kalau pelanggan, gak dikasi akses ke Admin
            }
            return view('admin.admin');
        } else {
            return $this->form(); // Kalau belum login, ditampilkan form login
        }
    }
    public function form(){
    	return view('admin.login');
    }
    public function attempt(Request $request){
    	$this->validate($request, [
    		'email' => 'email',
    		'password' => 'required'
    	]);
    	$attempts = [
    		'email' => $request->email,
    		'password' => $request->password
    	];

    	if(Auth::attempt($attempts, (bool) $request->remember)){
    		return redirect()->intended('/admin');
    	}
    	return redirect()->back();
    }
}
