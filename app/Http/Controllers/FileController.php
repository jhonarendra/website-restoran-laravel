<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index(){
    	return view('form');
    }
    public function upload(Request $request){
    	$file = $request->file('file');
    	$name = $file->getClientOriginalName();
    	$file->move('images', $name);

    	return redirect('form');
    }
}
