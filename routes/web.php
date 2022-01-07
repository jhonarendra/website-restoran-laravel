<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\App\KeuanganController;
use App\Http\Controllers\App\DompetController;
use App\Http\Controllers\App\AnggaranController;
use App\Http\Controllers\App\KategoriController;
use App\Http\Controllers\App\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/{any}', [HomeController::class, 'index'])->where('any','.*');
