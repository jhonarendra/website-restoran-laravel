<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\HidanganController;
use App\Http\Controllers\RestoranController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PegawaiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:api');
Route::get('user', [UserController::class, 'getUserLogin'])->middleware('auth:api');
Route::post('updateProfile', [UserController::class, 'updateProfile'])->middleware('auth:api');

Route::get('file/{path}/{filename}', [FileController::class, 'get']);



Route::group(['middleware' => ['auth:api', 'verified:api']], function () {
    Route::resource('reservasi', ReservasiController::class);
    Route::resource('pesanan', PesananController::class);
    Route::resource('hidangan', HidanganController::class);
    Route::resource('restoran', RestoranController::class);
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('pegawai', PegawaiController::class);
});