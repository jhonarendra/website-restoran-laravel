<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AkuntansiController extends Controller
{
    public function index(){
    	if(isset(Auth::user()->name)){ // Mengecek apakah dia sudah login apa belum
    	    if(Auth::user()->jabatan == 'Pelanggan'){ // Kalau sudah login, jabatannya dia Admin apa Pelanggan
    	        return redirect()->intended('/pelanggan'); // Kalau pelanggan, gak dikasi akses ke Admin
    	    }
    	    return view('admin.akuntansi');
    	} else {
    	    return redirect()->intended('/admin'); // Kalau belum login, ditampilkan form login
    	}
    }
}
