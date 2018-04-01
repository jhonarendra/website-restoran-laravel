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
	Route::group(['prefix'=>'reservasi'], function(){
		Route::get('/', 'ReservasiController@index');
		Route::get('/create', 'ReservasiController@create');
		Route::post('/store', 'ReservasiController@store');
	});
	Route::get('/pengaturan', 'PengaturanPelangganController@index');
});

Route::group(['prefix'=>'admin'], function(){
	Route::get('/','AdminController@index');
	Route::group(['prefix'=>'reservasi'], function(){
		Route::get('/', 'ReservasiController@index');
		Route::get('/edit/{id_reservation}', 'ReservasiController@show');
		Route::post('/update/{id_reservation}', 'ReservasiController@update');
	});
	Route::get('/pegawai', 'PegawaiController@index');
	Route::get('/dapur', 'DapurController@index');
	Route::get('/akuntansi', 'AkuntansiController@index');
});