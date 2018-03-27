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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pegawai', 'PegawaiController@index');
Route::get('/dapur', 'DapurController@index');
Route::get('/gudang', 'GudangController@index');
Route::get('/akuntansi', 'AkuntansiController@index');
Route::get('/pelayanan', 'PelayananController@index');