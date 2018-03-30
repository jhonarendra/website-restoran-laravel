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

Route::group(['prefix'=>'pelanggan'], function(){
	Route::get('/', 'PelangganController@index');
	Route::get('/reservasi', 'ReservasiController@index');
	Route::get('/pengaturan', 'PengaturanPelangganController@index');
});

Route::group(['prefix'=>'admin'], function(){
	Route::get('/login','AdminController@form');
	Route::post('attempt','AdminController@attempt')->name('admin.attempt');

	Route::get('/','AdminController@index');
	Route::get('/pegawai', 'PegawaiController@index');
	Route::get('/dapur', 'DapurController@index');
	Route::get('/gudang', 'GudangController@index');
	Route::get('/akuntansi', 'AkuntansiController@index');
	Route::get('/pelayanan', 'PelayananController@index');
});