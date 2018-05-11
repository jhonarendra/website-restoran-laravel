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

Route::get('/', 'IndexController@index');

Auth::routes();

Route::group(['prefix'=>'pelanggan'], function(){
	Route::get('', 'PelangganController@index');

	Route::get('login', 'PelangganController@showLoginForm');
	Route::post('login', 'PelangganController@login');
	Route::get('logout', 'PelangganController@logout');
	Route::get('register', 'PelangganController@showRegisterForm');
	Route::post('register', 'PelangganController@register');

	Route::resource('reservasi', 'PelangganReservasiController');
	Route::resource('pemesanan', 'PelangganPemesananController');
	Route::resource('hidangan', 'PelangganHidanganController');
	Route::resource('pengaturan', 'PelangganPengaturanController');
});

Route::group(['prefix'=>'pegawai'], function(){
	Route::get('', 'PegawaiController@index');

	Route::get('login', 'PegawaiController@showLoginForm');
	Route::post('login', 'PegawaiController@login');
	Route::get('logout', 'PegawaiController@logout');
	Route::get('register', 'PegawaiController@showRegisterForm');
	Route::post('register', 'PegawaiController@register');

	Route::resource('reservasi', 'PegawaiReservasiController');
	Route::resource('pemesanan', 'PegawaiPemesananController');
	Route::resource('pelanggan', 'PegawaiPelangganController');
	Route::resource('pegawai', 'PegawaiPegawaiController');
	Route::resource('restoran', 'PegawaiRestoranController');
	Route::resource('hidangan', 'PegawaiHidanganController');
	Route::resource('pengaturan', 'PegawaiPengaturanController');
});