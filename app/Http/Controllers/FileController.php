<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
// use League\Flysystem\FileNotFoundException;
use Illuminate\Http\Request;
use Auth;

class FileController extends Controller
{
    public function get($path, $filename)
    {
        // try {
            return response()->file(storage_path('app') .'/'. $path . '/' . $filename);
        // } catch (FileNotFoundException  $e) {
        //     return abort(404);
        // }
    }
}
