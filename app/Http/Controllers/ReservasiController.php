<?php

namespace App\Http\Controllers;
use Auth;
use App\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservasiController extends Controller
{
    public function index(){
    	if(Auth::user()->jabatan == 'Admin'){

            $reservasi = Reservasi::raw("SELECT id_reservation, (SELECT NAME FROM users WHERE id = reservations.`id_pelanggan`) AS 'nama_pelanggan', (SELECT NAME FROM users WHERE id = reservations.`id_admin`) AS 'nama_admin', reservations.`created_at`, no_meja_reservasi, status_reservasi, reservations.`updated_at` FROM reservations INNER JOIN users ON reservations.`id_pelanggan` = users.`id`")->get();
            
            return view('admin.reservasi', ['reservasi'=>$reservasi]);
    	}

        if(Auth::user()->jabatan == 'Pelanggan'){
            $id_pelanggan = Auth::user()->id;

        	$reservasi = Reservasi::raw("SELECT id_reservation, (SELECT NAME FROM users WHERE id = reservations.`id_pelanggan`) AS 'nama_pelanggan', (SELECT NAME FROM users WHERE id = reservations.`id_admin`) AS 'nama_admin', created_at, no_meja_reservasi, status_reservasi, reservations.`updated_at` FROM reservations INNER JOIN users ON reservations.`id_pelanggan` = users.`id` WHERE id_pelanggan=$id_pelanggan")->get();
            
        	return view('pelanggan.reservasi.reservasi', ['reservasi'=>$reservasi]);
        }
    }
    public function create(){
    	return view('pelanggan.reservasi.create');
    }
    public function store(Request $request){
    	$this->validate($request, [
    	    'id_pelanggan' => 'required'
    	]);

    	$data = [
			'id_pelanggan' => $request->id_pelanggan,
			'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
		];
		Reservasi::insert($data);
        return redirect('pelanggan/reservasi');
    }
    public function show($id_reservation){
        //$reservasi = Reservasi::raw("SELECT * FROM reservations WHERE id_reservation=$id_reservation") ->get();
        $reservasi = Reservasi::where('id_reservation', $id_reservation)->get();
        return view('admin.reservasi.edit', compact('reservasi'));
    }
    public function update(Request $request, $id_reservation){
        /*$this->validate($request, [
            'no_meja_reservasi' => 'required',
            'status_reservasi' => 'required',
            'id_pegawai' => 'required',
        ]);*/

        $data = [
            'no_meja_reservasi' => $request->no_meja_reservasi,
            'status_reservasi' => $request->status_reservasi,
            'id_admin' => $request->id_admin,
            'updated_at' => date("Y-m-d H:i:s")
        ];

        Reservasi::where('id_reservation', $id_reservation)->update($data);

        return redirect('admin/reservasi');
    }
}
