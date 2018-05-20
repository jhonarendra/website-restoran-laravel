<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use App\Pegawai;
use App\Reservasi;
use App\Restoran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PegawaiController;

class PegawaiReservasiController extends Controller {

    public function index(){
        if(!PegawaiController::getPegawai()){
            return redirect('pegawai/login');
        }
        $pegawai = PegawaiController::getPegawai();
        $reservasi = Reservasi::join('tb_restoran', 'tb_restoran.id_restoran', '=', 'tb_reservasi.id_restoran')->join('tb_pegawai', 'tb_pegawai.id_pegawai', '=', 'tb_reservasi.id_pegawai')->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan', '=', 'tb_reservasi.id_pelanggan')->select('tb_reservasi.*', 'nama_restoran', 'nama_pegawai', 'nama_pelanggan')->where('deleted', 0)->get();
        return view('pegawai.reservasi.index', compact('reservasi', 'pegawai'));
    }

    public function create(){
        if(!PegawaiController::getPegawai()){
            return redirect('pegawai/login');
        }
        $pegawai = PegawaiController::getPegawai();
        $pelanggan = Pelanggan::all();
        $pegawais = Pegawai::all();
        $restoran = Restoran::all();
        return view('pegawai.reservasi.create', compact('pegawais', 'pegawai', 'pelanggan', 'restoran'));
    }

    public function store(Request $request){
        $pegawai = PegawaiController::getPegawai();

        $data = [
            'id_restoran' => $request->id_restoran,
            'id_pelanggan' => $request->id_pelanggan,
            'id_pegawai' => $request->id_pegawai,
            'no_meja_reservasi' => $request->no_meja_reservasi,
            'status_reservasi' => $request->status_reservasi,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Reservasi::insert($data);
        return redirect('pegawai/reservasi');
    }

    public function show($id){
        
    }

    public function edit($id){
        if(!PegawaiController::getPegawai()){
            return redirect('pegawai/login');
        }
        $pegawai = PegawaiController::getPegawai();
        $pelanggan = Pelanggan::all();
        $pegawais = Pegawai::all();
        $restoran = Restoran::all();
        $reservasi = Reservasi::where('deleted', 0)->where('id_reservasi', $id)->get();
        return view('pegawai.reservasi.edit', compact('reservasi', 'pegawais', 'pelanggan', 'restoran', 'pegawai'));
    }

    public function update(Request $request, $id){
        $data = [
            'id_restoran' => $request->id_restoran,
            'id_pegawai' => $request->id_pegawai,
            'id_pelanggan' => $request->id_pelanggan,
            'no_meja_reservasi' => $request->no_meja_reservasi,
            'status_reservasi' => $request->status_reservasi,
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Reservasi::where('id_reservasi', $id)->update($data);
        return redirect('pegawai/reservasi');
    }

    public function destroy($id){
        $data = [
            'deleted' => 1,
        ];
        Reservasi::where('id_reservasi', $id)->update($data);
        return redirect('pegawai/reservasi');
    }
}
