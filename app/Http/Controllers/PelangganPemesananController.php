<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use App\Pemesanan;
use App\DetilPemesanan;
use App\Restoran;
use App\Hidangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PelangganController;

class PelangganPemesananController extends Controller {
    public function index(){
        if(!PelangganController::getPelanggan()){
            return redirect('pelanggan/login');
        }
        $pelanggan = PelangganController::getPelanggan();
        $pemesanan = Pemesanan::join('tb_restoran', 'tb_restoran.id_restoran', '=', 'tb_pemesanan.id_restoran')->join('tb_pegawai', 'tb_pegawai.id_pegawai', '=', 'tb_pemesanan.id_pegawai')->select('tb_pemesanan.*', 'nama_restoran', 'nama_pegawai')->where('id_pelanggan', $pelanggan['id_pelanggan'])->get();
        return view('pelanggan.pemesanan.index', compact('pemesanan', 'pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        if(!PelangganController::getPelanggan()){
            return redirect('pelanggan/login');
        }
        $restoran = Restoran::all();
        $makanan = Hidangan::where('jenis_hidangan', 'Makanan')->get();
        $minuman = Hidangan::where('jenis_hidangan', 'Minuman')->get();
        $pelanggan = PelangganController::getPelanggan();
        return view('pelanggan.pemesanan.create', compact('restoran', 'makanan', 'minuman', 'pelanggan'));
    }

    public function store(Request $request){
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
        $pelanggan = PelangganController::getPelanggan();
        $data = [
            'id_pelanggan' => $pelanggan['id_pelanggan'],
            'id_restoran' => $request->id_restoran,
            'id_pegawai' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Pemesanan::insert($data);

        // 2.
        $sql = Pemesanan::select('id_pemesanan')->where('id_pelanggan', '=', $pelanggan['id_pelanggan'])->orderBy('id_pemesanan', 'desc')->first();
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
    public function show($id){
        if(!PelangganController::getPelanggan()){
            return redirect('pelanggan/login');
        }
        $pelanggan = PelangganController::getPelanggan();
        $detil_pemesanan = DetilPemesanan::join('tb_pemesanan', 'tb_pemesanan.id_pemesanan', '=', 'tb_detil_pemesanan.id_pemesanan')
        ->join('tb_hidangan', 'tb_hidangan.id_hidangan', '=', 'tb_detil_pemesanan.id_hidangan')
        ->join('tb_restoran', 'tb_restoran.id_restoran', '=', 'tb_pemesanan.id_restoran')
        ->join('tb_pegawai', 'tb_pegawai.id_pegawai', '=', 'tb_pemesanan.id_pegawai')
        ->where('tb_pemesanan.id_pemesanan', $id)
        ->where('tb_pemesanan.id_pelanggan', $pelanggan['id_pelanggan'])
        ->get();
        return view('pelanggan.pemesanan.show', compact('detil_pemesanan', 'pelanggan'));
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
