<?php
namespace App\Http\Controllers;
session_start();
use App\Pelanggan;
use App\Hidangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganHidanganController extends Controller {

    public function index(){
        if (!isset($_SESSION['id_pelanggan'])) {
            return redirect('pelanggan/login');
        } else {
            $row = Pelanggan::where('id_pelanggan', $_SESSION['id_pelanggan'])->first();
            $pelanggan = [
                'id_pelanggan' => $row['id_pelanggan'],
                'nama_pelanggan' => $row['nama_pelanggan'],
                'email_pelanggan' => $row['email_pelanggan'],
                'foto_pelanggan' => $row['foto_pelanggan'],
            ];

            $makanan = Hidangan::where('jenis_hidangan', 'Makanan')->get();
            $minuman = Hidangan::where('jenis_hidangan', 'Minuman')->get();

            return view('pelanggan.hidangan.index', compact('pelanggan', 'makanan', 'minuman'));
        }
    }
}
