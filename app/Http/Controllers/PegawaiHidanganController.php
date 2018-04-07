<?php

namespace App\Http\Controllers;

use App\Hidangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiHidanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hidangan = Hidangan::all();
        return view('pegawai.hidangan.index', compact('hidangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.hidangan.create');
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
            'nama_hidangan' => 'required',
            'jenis_hidangan' => 'required'
        ]);

        $data = [
            'nama_hidangan' => $request->nama_hidangan,
            'jenis_hidangan' => $request->jenis_hidangan,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Hidangan::insert($data);
        return redirect('pegawai/hidangan');
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
        $hidangan = Hidangan::where('id_hidangan', $id)->get();
        return view('pegawai.hidangan.edit', compact('hidangan'));
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
            'nama_hidangan' => $request->nama_hidangan,
            'jenis_hidangan' => $request->jenis_hidangan,
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Hidangan::where('id_hidangan', $id)->update($data);

        return redirect('pegawai/hidangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hidangan::where('id_hidangan', '=', $id)->delete();
        return redirect('pegawai/hidangan');
    }
}
