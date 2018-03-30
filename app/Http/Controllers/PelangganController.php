<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->jabatan == 'Admin'){ // Kalau dia Admin, gak boleh ngakses halaman pelanggan
            return redirect()->intended('/admin');
        }
        return view('pelanggan.dashboard');
    }
}
