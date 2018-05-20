<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use App\Reservasi;
use App\Restoran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PelangganController;

class PelangganReservasiController extends Controller {

    public function index(){
        if(!PelangganController::getPelanggan()){
            return redirect('pelanggan/login');
        }
        $pelanggan = PelangganController::getPelanggan();
        $reservasi = Reservasi::join('tb_restoran', 'tb_restoran.id_restoran', '=', 'tb_reservasi.id_restoran')->join('tb_pegawai', 'tb_pegawai.id_pegawai', '=', 'tb_reservasi.id_pegawai')->select('tb_reservasi.*', 'nama_restoran', 'nama_pegawai')->where('id_pelanggan', $pelanggan['id_pelanggan'])->where('deleted', 0)->get();
        return view('pelanggan.reservasi.index', compact('reservasi', 'pelanggan'));
    }
    
    public function create(){
        if(!PelangganController::getPelanggan()){
            return redirect('pelanggan/login');
        }
        $pelanggan = PelangganController::getPelanggan();
        $reservasi = Pelanggan::where('id_pelanggan', $pelanggan['id_pelanggan'])->get();
        $restoran = Restoran::all();
        return view('pelanggan.reservasi.create', compact('reservasi', 'restoran', 'pelanggan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $pelanggan = PelangganController::getPelanggan();

        $this->validate($request, [
            'id_restoran' => 'required'
        ]);

        $data = [
            'id_pelanggan' => $pelanggan['id_pelanggan'],
            'id_restoran' => $request->id_restoran,
            'id_pegawai' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Reservasi::insert($data);
        return redirect('pelanggan/reservasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
