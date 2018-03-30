<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class PengaturanPelangganController extends Controller
{
    public function index(){
    	if(Auth::user()->jabatan == 'Admin'){ // Kalau dia Admin, gak boleh ngakses halaman pelanggan
    	    return redirect()->intended('/admin');
    	}
    	return view('pelanggan.pengaturan');
    }
}
