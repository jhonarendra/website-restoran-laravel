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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'pelanggan'], function(){
	Route::get('', 'PelangganController@index');
	Route::resource('reservasi', 'PelangganReservasiController');
	Route::resource('pemesanan', 'PelangganPemesananController');
	Route::resource('pengaturan', 'PelangganPengaturanController');
});

Route::group(['prefix'=>'pegawai'], function(){
	Route::get('', 'PegawaiController@index');
	Route::resource('reservasi', 'PegawaiReservasiController');
	Route::resource('pemesanan', 'PegawaiPemesananController');
	Route::resource('pelanggan', 'PegawaiPelangganController');
	Route::resource('pegawai', 'PegawaiPegawaiController');
	Route::resource('restoran', 'PegawaiRestoranController');
	Route::resource('hidangan', 'PegawaiHidanganController');
	Route::resource('pengaturan', 'PegawaiPengaturanController');
});