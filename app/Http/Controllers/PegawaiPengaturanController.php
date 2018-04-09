<?php

namespace App\Http\Controllers;

use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiPengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_pegawai = 2;
        $pegawai = Pegawai::where('id_pegawai', $id_pegawai)->get();
        return view('pegawai.pengaturan.index', compact('pegawai'));
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
    public function store(Request $request)
    {
        //
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
        $id_pegawai = 2;
        $pegawai = Pegawai::where('id_pegawai', $id_pegawai)->get();
        return view('pegawai.pengaturan.edit', compact('pegawai'));
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
            'nama_pegawai' => $request->nama_pegawai,
            'email_pegawai' => $request->email_pegawai,
            'username_pegawai' => $request->username_pegawai,
            'password_pegawai' => bcrypt($request->password_pegawai),
            'jabatan_pegawai' => $request->jabatan_pegawai,
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Pegawai::where('id_pegawai', $id)->update($data);

        return redirect('pegawai/pengaturan');
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
