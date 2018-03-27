<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DapurController extends Controller
{
    public function index(){
    	return view('dapur');
    }
}
