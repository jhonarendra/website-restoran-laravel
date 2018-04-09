<?php

namespace App\Http\Controllers;

use App\Restoran;
use Illuminate\Http\Request;

class PegawaiRestoranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restoran = Restoran::all();
        return view('pegawai.restoran.index', compact('restoran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.restoran.create');
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
            'nama_restoran' => 'required',
            'alamat_restoran' => 'required',
        ]);

        $data = [
            'nama_restoran' => $request->nama_restoran,
            'alamat_restoran' => $request->alamat_restoran,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Restoran::insert($data);
        return redirect('pegawai/restoran');
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
        $restoran = Restoran::where('id_restoran', $id)->get();
        return view('pegawai.restoran.edit', compact('restoran'));
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
            'nama_restoran' => $request->nama_restoran,
            'alamat_restoran' => $request->alamat_restoran,
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Restoran::where('id_restoran', $id)->update($data);
        return redirect('pegawai/restoran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Restoran::where('id_restoran', $id)->delete();
        return redirect('pegawai/restoran');
    }
}
