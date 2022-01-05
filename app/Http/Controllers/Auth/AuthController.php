<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\Pengguna;

class AuthController extends Controller
{
	public function showFormLogin()
	{
		if (Auth::check()) {
			return redirect()->route('home');
		}
		return view('auth.login');
	}
	public function login(Request $request)
	{
		$rules = [
			'email'	=> 'required|email',
			'password' => 'required|string'
		];
  
		$messages = [
			'email.required' => 'Email wajib diisi',
			'email.email' => 'Email tidak valid',
			'password.required'	=> 'Password wajib diisi',
			'password.string' => 'Password harus berupa string'
		];
  
		$validator = Validator::make($request->all(), $rules, $messages);
  
		if($validator->fails()){
			return redirect()->back()->withErrors($validator)->withInput($request->all);
		}
  
		$data = [
			'email'	 => $request->input('email'),
			'password'  => $request->input('password'),
		];
  
		Auth::attempt($data);
  
		if (Auth::check()) {
            $user = Auth::user();
            // get user role
            $role = UserRole::join('rbac_role', 'rbac_role.role_id', 'rbac_user_role.role_id')->where('user_id', $user->user_id)->get();



            $pengguna = Pengguna::where([
                'id_user' => $user->id_user,
                'deleted' => 0
            ])->first();

            session(['role' => $role]);
            session(['pengguna' => $pengguna]);
            session(['current_role' => $role[0]]);
            
			return redirect()->route('app');
		} else {
			Session::flash('error', 'Email atau password salah');
			return redirect()->route('login');
		}
	}
	public function showFormRegister()
	{
		return view('auth.register');
	}
	public function register(Request $request)
	{
		$rules = [
			'name' => 'required|min:3|max:35',
			'email' => 'required|email|unique:rbac_user,email',
			'password' => 'required|confirmed'
		];
  
		$messages = [
			'name.required' => 'Nama Lengkap wajib diisi',
			'name.min' => 'Nama lengkap minimal 3 karakter',
			'name.max' => 'Nama lengkap maksimal 35 karakter',
			'email.required' => 'Email wajib diisi',
			'email.email' => 'Email tidak valid',
			'email.unique' => 'Email sudah terdaftar',
			'password.required' => 'Password wajib diisi',
			'password.confirmed' => 'Password tidak sama dengan konfirmasi password'
		];
  
		$validator = Validator::make($request->all(), $rules, $messages);
  
		if($validator->fails()){
			return redirect()->back()->withErrors($validator)->withInput($request->all);
		}
  
		// $user = new User;
		// $user->name = ucwords(strtolower($request->name));
		// $user->email = strtolower($request->email);
		// $user->password = Hash::make($request->password);
		// $user->email_verified_at = \Carbon\Carbon::now();
		// $simpan = $user->save();

		$id_user = Pengguna::insertGetId([
			'nama_lengkap' => ucwords(strtolower($request->name)),
			'email' => strtolower($request->email)
		]);

		$user_id = User::insertGetId([
			'nama' => ucwords(strtolower($request->name)),
			'id_user' => $id_user,
			'email' => strtolower($request->email),
			'password' => Hash::make($request->password),
			'email_verified_at' => \Carbon\Carbon::now()
		]);

		UserRole::insert([
			'user_id' => $user_id,
			'role_id' => 2
		]);

		return redirect()->route('login');
	}
  
	public function logout()
	{
		Auth::logout();
        session()->forget('role');
        session()->forget('pengguna');
		return redirect()->route('home');
	}
}
