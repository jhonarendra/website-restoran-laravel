<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use App\Pemesanan;
use App\Reservasi;
use App\DetilPemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PegawaiController;

class PegawaiPelangganController extends Controller{

    public function index(){
        if(!PegawaiController::getPegawai()){
            return redirect('pegawai/login');
        }
        $pegawai = PegawaiController::getPegawai();
        $pelanggan = Pelanggan::all();
        return view('pegawai.pelanggan.index', compact('pelanggan', 'pegawai'));
    }

    public function create(){
        if(!PegawaiController::getPegawai()){
            return redirect('pegawai/login');
        }
        $pegawai = PegawaiController::getPegawai();
        return view('pegawai.pelanggan.create', compact('pegawai'));
    }

    public function store(Request $request){

        $file = $request->file('foto_pelanggan');
        $format = $file->getClientOriginalExtension();
        $name = $request->username.'.'.$format;
        $file->move('images/profil', $name);


        $data = [
            'nama_pelanggan' => $request->name,
            'email_pelanggan' => $request->email,
            'username_pelanggan' => $request->username,
            'password_pelanggan' => md5($request->password),
            'foto_pelanggan' => $name,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Pelanggan::insert($data);
        return redirect('pegawai/pelanggan');
    }

    public function show($id){
        
    }

    public function edit($id){
        if(!PegawaiController::getPegawai()){
            return redirect('pegawai/login');
        }
        $pegawai = PegawaiController::getPegawai();
        $pelanggan = Pelanggan::where('id_pelanggan', $id)->get();
        return view('pegawai.pelanggan.edit', compact('pelanggan', 'pegawai'));
    }

    public function update(Request $request, $id){
        $data = [
            'nama_pelanggan' => $request->nama_pelanggan,
            'email_pelanggan' => $request->email_pelanggan,
            'username_pelanggan' => $request->username_pelanggan,
            'password_pelanggan' => md5($request->password_pelanggan),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Pelanggan::where('id_pelanggan', $id)->update($data);
        return redirect('pegawai/pelanggan');
    }

    public function destroy($id){
        Reservasi::where('id_pelanggan', $id)->delete();

        $sql = Pemesanan::select('id_pemesanan')->where('id_pelanggan', $id)->get();

        foreach ($sql as $sql) {
            $id_pemesanan = $sql->id_pemesanan;
            DetilPemesanan::where('id_pemesanan', $id_pemesanan)->delete();
        }

        Pelanggan::where('id_pelanggan', $id)->delete();
        return redirect('pegawai/pelanggan');
    }
}
