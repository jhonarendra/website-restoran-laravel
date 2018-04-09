<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use App\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservasi = Reservasi::join('tb_restoran', 'tb_restoran.id_restoran', '=', 'tb_reservasi.id_restoran')->join('tb_pegawai', 'tb_pegawai.id_pegawai', '=', 'tb_reservasi.id_pegawai')->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan', '=', 'tb_reservasi.id_pelanggan')->select('tb_reservasi.*', 'nama_restoran', 'nama_pegawai', 'nama_pelanggan')->get();
        return view('pegawai.reservasi.index', compact('reservasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.reservasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $reservasi = Reservasi::where('id_reservasi', $id)->get();
        return view('pegawai.reservasi.edit', compact('reservasi'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reservasi::where('id_reservasi', $id)->delete();
        return redirect('pegawai/reservasi');
    }
}
