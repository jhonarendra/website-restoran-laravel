<?php

namespace App\Http\Controllers;

use App\Pemesanan;
use App\DetilPemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiPemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesanan = Pemesanan::join('tb_restoran', 'tb_restoran.id_restoran', '=', 'tb_pemesanan.id_restoran')->join('tb_pegawai', 'tb_pegawai.id_pegawai', '=', 'tb_pemesanan.id_pegawai')->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan', '=', 'tb_pemesanan.id_pelanggan')->select('tb_pemesanan.*', 'nama_restoran', 'nama_pegawai', 'nama_pelanggan')->get();
        return view('pegawai.pemesanan.index', compact('pemesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.pemesanan.create');
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
            'id_restoran' => 'required',
            'id_pegawai' => 'required',
            'id_pelanggan' => 'required',
            'id_hidangan' => 'required',
            'jumlah_hidangan' => 'required',
        ]);

        $data = [
            'id_restoran' => $request->id_restoran,
            'id_pegawai' => $request->id_pegawai,
            'id_pelanggan' => $request->id_pelanggan,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Pemesanan::insert($data);

        $id_pelanggan = $request->id_pelanggan;

        $sql = Pemesanan::select('id_pemesanan')->where('id_pelanggan', '=', $id_pelanggan)->orderBy('id_pemesanan', 'desc')->first();

        $id_pemesanan = $sql['id_pemesanan'];

        $data2 = [
            'id_pemesanan' => $id_pemesanan,
            'id_hidangan' => $request->id_hidangan,
            'jumlah_hidangan' => $request->jumlah_hidangan,
            'total_harga_hidangan' => 0,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        DetilPemesanan::insert($data2);

        return redirect('pegawai/pemesanan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detil_pemesanan = DetilPemesanan::join('tb_pemesanan', 'tb_pemesanan.id_pemesanan', '=', 'tb_detil_pemesanan.id_pemesanan')
        ->join('tb_hidangan', 'tb_hidangan.id_hidangan', '=', 'tb_detil_pemesanan.id_hidangan')
        ->join('tb_restoran', 'tb_restoran.id_restoran', '=', 'tb_pemesanan.id_restoran')
        ->join('tb_pegawai', 'tb_pegawai.id_pegawai', '=', 'tb_pemesanan.id_pegawai')
        ->where('tb_pemesanan.id_pemesanan', $id)
        ->get();

        return view('pegawai.pemesanan.show', compact('detil_pemesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemesanan = Pemesanan::where('id_pemesanan', $id)->get();
        return view('pegawai.pemesanan.edit', compact('pemesanan'));
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
            'id_pelanggan' => $request->id_pelanggan,
            'id_pegawai' => $request->id_pegawai,
            'total_pemesanan' => $request->total_pemesanan,
            'status_pemesanan' => $request->status_pemesanan,
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Pemesanan::where('id_pemesanan', $id)->update($data);
        return redirect('pegawai/pemesanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DetilPemesanan::where('id_pemesanan', $id)->delete();
        Pemesanan::where('id_pemesanan', $id)->delete();
        return redirect('pegawai/pemesanan');
    }
}
