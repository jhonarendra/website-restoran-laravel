<?php

namespace App\Http\Controllers;

use App\Pemesanan;
use App\DetilPemesanan;
use App\Restoran;
use App\Hidangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganPemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesanan = Pemesanan::join('tb_restoran', 'tb_restoran.id_restoran', '=', 'tb_pemesanan.id_restoran')->join('tb_pegawai', 'tb_pegawai.id_pegawai', '=', 'tb_pemesanan.id_pegawai')->select('tb_pemesanan.*', 'nama_restoran', 'nama_pegawai')->where('id_pelanggan', 1)->get();
        return view('pelanggan.pemesanan.index', compact('pemesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restoran = Restoran::all();
        $hidangan = Hidangan::all();
        return view('pelanggan.pemesanan.create', compact('restoran', 'hidangan'));
    }

    /*public function hidangan(){
        return view('pelanggan.pemesanan.hidangan');
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*---------------------------------------------+
        |             ALUR KERJA PEMESANAN             |
        |-----------------------------------------------
        | 1. Pertama insert ke tb_pemesanan dulu       |
        | 2. Diambil id_pemesanan terakhir             |
        | 3. Diambil id_hidangan dari checkbox yang di |
        |    check                                     |
        | 4. Looping untuk inset ke tb_detil_pemesanan |
        |    sebanyak hidangan yang dipesan            |
        | 5. Update tb_pemesanan ubah nilai total      |
        |    pemesanannya                              |
        +---------------------------------------------*/

        // 1.
        $data = [
            'id_pelanggan' => 1,
            'id_restoran' => $request->id_restoran,
            'id_pegawai' => 1,
            'id_pelanggan' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Pemesanan::insert($data);

        // 2.
        $sql = Pemesanan::select('id_pemesanan')->where('id_pelanggan', '=', 1)->orderBy('id_pemesanan', 'desc')->first();
        $id_pemesanan = $sql['id_pemesanan'];

        // 3.
        $id_hidangan = $request->hidangan;

        // 4.
        $total_pemesanan = 0;

        foreach ($id_hidangan as $id_hidangan) {
            $jml = 'jumlah_hidangan'.$id_hidangan;
            $hrg = 'harga_hidangan'.$id_hidangan;

            $jumlah_hidangan = $_POST[$jml];
            $harga_hidangan = $_POST[$hrg];
            $total_harga_hidangan = ((int)$jumlah_hidangan * (int)$harga_hidangan);
            $data2 = [
                'id_pemesanan' => $id_pemesanan,
                'id_hidangan' => $id_hidangan,
                'jumlah_hidangan' => $jumlah_hidangan,
                'total_harga_hidangan' => $total_harga_hidangan,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ];
            DetilPemesanan::insert($data2);

            $total_pemesanan = $total_pemesanan + $total_harga_hidangan;
        }

        // 5.
        $data3 = [
            'total_pemesanan' => $total_pemesanan,
        ];
        Pemesanan::where('id_pemesanan', $id_pemesanan)->update($data3);

        return redirect('pelanggan/pemesanan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$pemesanan = Pemesanan::join('tb_restoran', 'tb_restoran.id_restoran', '=', 'tb_pemesanan.id_restoran')->join('tb_pegawai', 'tb_pegawai.id_pegawai', '=', 'tb_pemesanan.id_pegawai')->select('tb_pemesanan.*', 'nama_restoran', 'nama_pegawai')->where('id_pelanggan', 1)->get();
        $detil_pemesanan = DetilPemesanan::join('tb_pemesanan', 'tb_pemesanan.id_pemesanan', '=', 'tb_detil_pemesanan.id_pemesanan')
        ->join('tb_hidangan', 'tb_hidangan.id_hidangan', '=', 'tb_detil_pemesanan.id_hidangan')
        ->join('tb_restoran', 'tb_restoran.id_restoran', '=', 'tb_pemesanan.id_restoran')
        ->join('tb_pegawai', 'tb_pegawai.id_pegawai', '=', 'tb_pemesanan.id_pegawai')
        ->where('tb_pemesanan.id_pemesanan', $id)
        ->where('tb_pemesanan.id_pelanggan', 1)
        ->get();

        /*$detil_pemesanan = DB::raw("SELECT * FROM tb_detil_pemesanan
INNER JOIN tb_pemesanan ON tb_detil_pemesanan.`id_pemesanan`=tb_pemesanan.`id_pemesanan`
INNER JOIN tb_restoran ON tb_pemesanan.`id_restoran`=tb_restoran.`id_restoran`
INNER JOIN tb_pegawai ON tb_pemesanan.`id_pegawai`=tb_pegawai.`id_pegawai`
INNER JOIN tb_hidangan ON tb_detil_pemesanan.`id_hidangan`=tb_hidangan.`id_hidangan`
WHERE tb_pemesanan.`id_pemesanan`=$id AND tb_pemesanan.`id_pelanggan`=1");*/

        return view('pelanggan.pemesanan.show', compact('detil_pemesanan'));
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
