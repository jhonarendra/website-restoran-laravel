<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use App\Pegawai;
use App\Pemesanan;
use App\Restoran;
use App\Hidangan;
use App\DetilPemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PegawaiController;

class PegawaiPemesananController extends Controller {

    public function index(){
        if(!PegawaiController::getPegawai()){
            return redirect('pegawai/login');
        }
        $pegawai = PegawaiController::getPegawai();
        $pemesanan = Pemesanan::join('tb_restoran', 'tb_restoran.id_restoran', '=', 'tb_pemesanan.id_restoran')->join('tb_pegawai', 'tb_pegawai.id_pegawai', '=', 'tb_pemesanan.id_pegawai')->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan', '=', 'tb_pemesanan.id_pelanggan')->select('tb_pemesanan.*', 'nama_restoran', 'nama_pegawai', 'nama_pelanggan')->get();
        return view('pegawai.pemesanan.index', compact('pemesanan', 'pegawai'));
    }

    public function create(){
        if(!PegawaiController::getPegawai()){
            return redirect('pegawai/login');
        }
        $pegawai = PegawaiController::getPegawai();
        $restoran = Restoran::all();
        $pelanggan = Pelanggan::all();
        $pegawais = Pegawai::all();
        $makanan = Hidangan::where('jenis_hidangan', 'Makanan')->get();
        $minuman = Hidangan::where('jenis_hidangan', 'Minuman')->get();
        return view('pegawai.pemesanan.create', compact('pegawais', 'restoran', 'pelanggan', 'makanan','minuman', 'pegawai'));
    }

    public function store(Request $request){
        $pegawai = PegawaiController::getPegawai();

        $data = [
            'id_restoran' => $request->id_restoran,
            'id_pegawai' => $request->id_pegawai,
            'id_pelanggan' => $request->id_pelanggan,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Pemesanan::insert($data);

        $sql = Pemesanan::select('id_pemesanan')->where('id_pelanggan', $request->id_pelanggan)->orderBy('id_pemesanan', 'desc')->first();
        $id_pemesanan = $sql['id_pemesanan'];

        $id_hidangan = $request->hidangan;

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

        $data3 = [
            'total_pemesanan' => $total_pemesanan,
        ];
        Pemesanan::where('id_pemesanan', $id_pemesanan)->update($data3);

        return redirect('pegawai/pemesanan');
    }

    public function show($id){
        if(!PegawaiController::getPegawai()){
            return redirect('pegawai/login');
        }
        $pegawai = PegawaiController::getPegawai();
        $detil_pemesanan = DetilPemesanan::join('tb_pemesanan', 'tb_pemesanan.id_pemesanan', '=', 'tb_detil_pemesanan.id_pemesanan')
        ->join('tb_hidangan', 'tb_hidangan.id_hidangan', '=', 'tb_detil_pemesanan.id_hidangan')
        ->join('tb_restoran', 'tb_restoran.id_restoran', '=', 'tb_pemesanan.id_restoran')
        ->join('tb_pegawai', 'tb_pegawai.id_pegawai', '=', 'tb_pemesanan.id_pegawai')
        ->where('tb_pemesanan.id_pemesanan', $id)
        ->get();

        return view('pegawai.pemesanan.show', compact('detil_pemesanan', 'pegawai'));
    }

    public function edit($id){
        if(!PegawaiController::getPegawai()){
            return redirect('pegawai/login');
        }
        $pegawai = PegawaiController::getPegawai();
        $pemesanan = Pemesanan::where('id_pemesanan', $id)->get();
        $restoran = Restoran::all();
        $pelanggan = Pelanggan::all();
        $pegawais = Pegawai::all();
        return view('pegawai.pemesanan.edit', compact('pemesanan','restoran','pelanggan','pegawais', 'pegawai'));
    }

    public function update(Request $request, $id){
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

    public function destroy($id){
        DetilPemesanan::where('id_pemesanan', $id)->delete();
        Pemesanan::where('id_pemesanan', $id)->delete();
        return redirect('pegawai/pemesanan');
    }
}
