<?php

namespace App\Http\Controllers;
use Auth;
use App\Pengaturan;
use Illuminate\Http\Request;

class PengaturanPelangganController extends Controller
{
    public function index(){
    	if(Auth::user()->jabatan == 'Admin'){ // Kalau dia Admin, gak boleh ngakses halaman pelanggan
    	    return redirect()->intended('/admin');
    	}
    	$pengaturan = Pengaturan::all();
    	return view('pelanggan.pengaturan', ['pengaturan'=>$pengaturan]);
    }
}
