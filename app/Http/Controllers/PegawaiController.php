<?php

namespace App\Http\Controllers;
session_start();
use App\Pegawai;
use App\Pelanggan;
use App\DetilPemesanan;
use App\Pemesanan;
use App\Reservasi;
use App\Hidangan;
use App\Restoran;
use Illuminate\Http\Request;

class PegawaiController extends Controller {

    public function index(){
        if (!isset($_SESSION['id_pegawai'])) {
            return redirect('pegawai/login');
        } else {
            $row = Pegawai::where('id_pegawai', $_SESSION['id_pegawai'])->first();
            $pegawai = [
                'id_pegawai' => $row['id_pegawai'],
                'nama_pegawai' => $row['nama_pegawai'],
                'email_pegawai' => $row['email_pegawai'],
                'username_pegawai' => $row['username_pegawai'],
                'jabatan_pegawai' => $row['jabatan_pegawai'],
                'foto_pegawai' => $row['foto_pegawai'],
            ];
            

            $dashboard = [
                'jumlah_pelanggan' => Pelanggan::count(),
                'jumlah_pesanan' => Pemesanan::count(),
                'jumlah_reservasi' => Reservasi::count(),
                'jumlah_hidangan' => Hidangan::count(),
            ];

            //$pesanan = DetilPemesanan::join('tb_pemesanan', 'tb_pemesanan.id_pemesanan', '=', 'tb_detil_pemesanan.id_pemesanan')->join('tb_hidangan', 'tb_hidangan.id_hidangan', '=', 'tb_detil_pemesanan.id_hidangan')->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan', '=', 'tb_pemesanan.id_pelanggan')->join('tb_pegawai', 'tb_pegawai.id_pegawai', '=', 'tb_pemesanan.id_pegawai')->get();

            $pesanan = Pemesanan::join('tb_pelanggan', 'tb_pelanggan.id_pelanggan', '=', 'tb_pemesanan.id_pelanggan')->join('tb_pegawai', 'tb_pegawai.id_pegawai', '=', 'tb_pemesanan.id_pegawai')->get();

            return view('pegawai.index', compact('pegawai', 'dashboard', 'pesanan'));
        }
        
        return view('pegawai.index', compact('pegawai'));
    }

    public static function getPegawai(){
    	if (!isset($_SESSION['id_pegawai'])) {
            return false;
        } else {
            $row = Pegawai::where('id_pegawai', $_SESSION['id_pegawai'])->first();
            $pegawai = [
                'id_pegawai' => $row['id_pegawai'],
                'nama_pegawai' => $row['nama_pegawai'],
                'email_pegawai' => $row['email_pegawai'],
                'username_pegawai' => $row['username_pegawai'],
                'jabatan_pegawai' => $row['jabatan_pegawai'],
                'foto_pegawai' => $row['foto_pegawai'],
            ];
            return $pegawai;
        }
    }

    public static function showLoginForm(){
    	if (!isset($_SESSION['id_pegawai'])) {
    		return view('pegawai.auth.login');
    	} else {
    		return redirect('pegawai');
    	}
    }

    public static function login(Request $request){
    	$email_pegawai = $request->email;
    	$password_pegawai = md5($request->password);

    	$row = Pegawai::where('email_pegawai', $email_pegawai)->where('password_pegawai', $password_pegawai)->exists();
    	$rows = $row['exists'];

    	if($row){
            $pegawai = Pegawai::where('email_pegawai', $email_pegawai)->where('password_pegawai', $password_pegawai)->get();
            foreach ($pegawai as $pegawai) {
                $_SESSION = [
                    'id_pegawai' => $pegawai->id_pegawai,
                    'nama_pegawai' => $pegawai->nama_pegawai,
                    'email_pegawai' => $pegawai->email_pegawai,
                    'username_pegawai' => $pegawai->username_pegawai,
                ];
            }
            return redirect('pegawai');
    		
    	} else {
    		echo 'gagal login';
    	}
    }

    public function showRegisterForm(){
        return view('pegawai.auth.register');
    }

    public function register(Request $request){
        $file = $request->file('foto_pegawai');
        $format = $file->getClientOriginalExtension();
        $name = $request->username.'.'.$format;
        $file->move('images/profil', $name);

        $data = [
            'nama_pegawai' => $request->name,
            'email_pegawai' => $request->email,
            'username_pegawai' => $request->username,
            'password_pegawai' => md5($request->password),
            'foto_pegawai' => $name,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Pegawai::insert($data);

        $pegawai = Pegawai::where('email_pegawai', $data['email_pegawai'])->where('password_pegawai', $data['password_pegawai'])->get();

        foreach ($pegawai as $pegawai) {
            $_SESSION = [
                'id_pegawai' => $pegawai->id_pegawai,
                'nama_pegawai' => $pegawai->nama_pegawai,
                'email_pegawai' => $pegawai->email_pegawai,
                'username_pegawai' => $pegawai->username_pegawai,
            ];
        }
        return redirect('pegawai');
    }

    public function logout(){
        session_destroy();

        return redirect('');
    }
}