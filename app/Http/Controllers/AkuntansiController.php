<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkuntansiController extends Controller
{
    public function index(){
    	return view('akuntansi');
    }
}
