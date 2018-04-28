<?php

namespace App\Http\Controllers;

use App\Restoran;
use App\Reservasi;
use App\Pemesanan;
use App\DetilPemesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\PegawaiController;

class PegawaiRestoranController extends Controller {

    public function index(){
        if(!PegawaiController::getPegawai()){
            return redirect('pegawai/login');
        }
        $pegawai = PegawaiController::getPegawai();
        $restoran = Restoran::all();
        return view('pegawai.restoran.index', compact('restoran', 'pegawai'));
    }

    public function create(){
        if(!PegawaiController::getPegawai()){
            return redirect('pegawai/login');
        }
        $pegawai = PegawaiController::getPegawai();
        return view('pegawai.restoran.create', compact('pegawai'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_restoran' => 'required',
            'alamat_restoran' => 'required',
        ]);

        $data = [
            'nama_restoran' => $request->nama_restoran,
            'alamat_restoran' => $request->alamat_restoran,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Restoran::insert($data);
        return redirect('pegawai/restoran');
    }

    public function show($id){
        
    }

    public function edit($id){
        if(!PegawaiController::getPegawai()){
            return redirect('pegawai/login');
        }
        $pegawai = PegawaiController::getPegawai();
        $restoran = Restoran::where('id_restoran', $id)->get();
        return view('pegawai.restoran.edit', compact('restoran', 'pegawai'));
    }

    public function update(Request $request, $id){
        $data = [
            'nama_restoran' => $request->nama_restoran,
            'alamat_restoran' => $request->alamat_restoran,
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Restoran::where('id_restoran', $id)->update($data);
        return redirect('pegawai/restoran');
    }

    public function destroy($id){
        Reservasi::where('id_restoran', $id)->delete();

        $sql = Pemesanan::select('id_pemesanan')->where('id_restoran', $id)->get();

        foreach ($sql as $sql) {
            $id_pemesanan = $sql->id_pemesanan;
            DetilPemesanan::where('id_pemesanan', $id_pemesanan)->delete();
        }
        Pemesanan::where('id_restoran', $id)->delete();
        Restoran::where('id_restoran', $id)->delete();
        return redirect('pegawai/restoran');
    }
}
