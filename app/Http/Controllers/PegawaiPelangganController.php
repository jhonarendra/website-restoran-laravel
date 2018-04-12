<?php

namespace App\Http\Controllers;

use App\Pelanggan;
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
        return view('pegawai.pelanggan.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_pelanggan' => 'required',
            'email_pelanggan' => 'required',
            'username_pelanggan' => 'required',
            'password_pelanggan' => 'required',
        ]);

        $data = [
            'nama_pelanggan' => $request->nama_pelanggan,
            'email_pelanggan' => $request->email_pelanggan,
            'username_pelanggan' => $request->username_pelanggan,
            'password_pelanggan' => md5($request->password_pelanggan),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
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
        return view('pegawai.pelanggan.edit', compact('pelanggan'));
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
        /* Jangan dihapus, maunya kasi status="Tidak Aktif"
        Pelanggan::where('id_pelanggan', $id)->delete();
        return redirect('pegawai/pelanggan');*/
    }
}
