<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use App\Reservasi;
use App\Restoran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservasi = Reservasi::join('tb_restoran', 'tb_restoran.id_restoran', '=', 'tb_reservasi.id_restoran')->join('tb_pegawai', 'tb_pegawai.id_pegawai', '=', 'tb_reservasi.id_pegawai')->select('tb_reservasi.*', 'nama_restoran', 'nama_pegawai')->where('id_pelanggan', 1)->get();
        return view('pelanggan.reservasi.index', compact('reservasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservasi = Pelanggan::where('id_pelanggan', 1)->get();
        $restoran = Restoran::all();
        return view('pelanggan.reservasi.create', compact('reservasi','restoran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_restoran' => 'required'
        ]);

        $data = [
            'id_pelanggan' => 1,
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
