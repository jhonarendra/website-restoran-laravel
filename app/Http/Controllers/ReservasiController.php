<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index(){
    	return view('pelanggan.reservasi');
    }
}
