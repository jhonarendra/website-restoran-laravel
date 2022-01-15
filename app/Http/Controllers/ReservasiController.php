<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Reservasi;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservasi = Reservasi::with('restoran', 'pelanggan', 'pegawai')->get();
        return response()->json([
            'status' => true,
            'message' => 'Berhasil mengambil data',
            'data' => $reservasi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id_restoran' => 'required',
            'id_pelanggan' => 'required',
            'jumlah_tamu' => 'required',
            'tanggal_reservasi' => 'required'
        ]);

        $input = array(
            'id_restoran' => $req->id_restoran,
            'id_pelanggan' => $req->id_pelanggan,
            'jumlah_tamu' => $req->jumlah_tamu,
            'tanggal_reservasi' => $req->tanggal_reservasi,
            'status' => 0
        );
        if (isset($req->keterangan_pelanggan)) {
            $input['keterangan_pelanggan'] = $req->keterangan_pelanggan;
        }
        $reservasi = Reservasi::create($input);

        // set no_reservasi
        $no_reservasi = 'RES/'.$req->id_restoran.'/'.date('Y-m-d').'/'.$reservasi->id_reservasi;
        
        Reservasi::find($reservasi->id_reservasi)->update([
            'no_reservasi' => $no_reservasi
        ]);
        
        return response()->json([
            'status' => true,
            'message' => 'Berhasil membuat reservasi. Harap tunggu konfirmasi dari kami',
            'data' => []
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservasi = Reservasi::with('restoran', 'pelanggan.user', 'pegawai.user')
        ->where('id_reservasi', $id)
        ->first();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil mengambil data',
            'data' => $reservasi
        ]);
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
