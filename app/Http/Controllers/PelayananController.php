<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelayananController extends Controller
{
    public function index(){
    	return view('pelayanan');
    }
}
