<?php

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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

//Route::get('/pelanggan', 'HomeController@index')->name('home');
Route::group(['prefix'=>'pelanggan'], function(){
	Route::get('/', 'PelangganController@index');
	Route::get('/reservasi', 'ReservasiController@index');
	Route::get('/pengaturan', 'PengaturanPelangganController@index');
});

//YG INI KEBAWAH MASIH SALAH
//Route::get('/admin','AdminController@showloginpemilik');

//Route::group(['prefix'=>'admin', 'middleware'=> ['auth:admin']], function(){
//	Route::get('/', 'AdminController@showloginadmin');
//});

//Route::get('/pegawai', 'PegawaiController@index');
//Route::get('/dapur', 'DapurController@index');
//Route::get('/gudang', 'GudangController@index');
//Route::get('/akuntansi', 'AkuntansiController@index');
//Route::get('/pelayanan', 'PelayananController@index');