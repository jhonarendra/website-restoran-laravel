<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Auth;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }
    public function indexHtml(){
        return File::get(public_path() . '/app/index.html');
    }
    public function app(){
        return view('app.index');
    }
    public function blog(){
        return view('blog.index');
    }
}
