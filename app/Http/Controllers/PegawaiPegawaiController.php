<?php

namespace App\Http\Controllers;

use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.pegawai.create');
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
            'nama_pegawai' => 'required',
            'email_pegawai' => 'required',
            'username_pegawai' => 'required',
            'password_pegawai' => 'required',
            'jabatan_pegawai' => 'required',
        ]);

        $data = [
            'nama_pegawai' => $request->nama_pegawai,
            'email_pegawai' => $request->email_pegawai,
            'username_pegawai' => $request->username_pegawai,
            'password_pegawai' => bcrypt($request->password_pegawai),
            'jabatan_pegawai' => $request->jabatan_pegawai,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Pegawai::insert($data);
        return redirect('pegawai/pegawai');
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
        $pegawai = Pegawai::where('id_pegawai', $id)->get();
        return view('pegawai.pegawai.edit', compact('pegawai'));
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

        return redirect('pegawai/pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pegawai::where('id_pegawai', '=', $id)->delete();
        return redirect('pegawai/pegawai');
    }
}
