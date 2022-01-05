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

Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);



/*
|--------------------------------------------------------------------------
| Application
|--------------------------------------------------------------------------
|
| Aplikasi utama
|
|
*/
Route::group(['middleware' => 'auth'], function () {
	Route::get('/app', [HomeController::class, 'app'])->name('app');
	Route::get('/app/{any}', [HomeController::class, 'app'])->where('any','.*');

	Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/test', function(){
	return Auth::user();
});