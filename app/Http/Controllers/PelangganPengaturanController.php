<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PelangganController;

class PelangganPengaturanController extends Controller {

    public function index(){
        if(!PelangganController::getPelanggan()){
            return redirect('pelanggan/login');
        }
        $pelanggan = PelangganController::getPelanggan();
        return view('pelanggan.pengaturan.index', compact('pelanggan'));
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
        $pelanggan = PelangganController::getPelanggan();
        return view('pelanggan.pengaturan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $file = $request->file('foto_pelanggan');
        $format = $file->getClientOriginalExtension();
        $name = $request->username_pelanggan.'.'.$format;
        $file->move('images/profil', $name);

        $data = [
            'nama_pelanggan' => $request->nama_pelanggan,
            'email_pelanggan' => $request->email_pelanggan,
            'username_pelanggan' => $request->username_pelanggan,
            'password_pelanggan' => md5($request->password_pelanggan),
            'foto_pelanggan' => $name,
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Pelanggan::where('id_pelanggan', $id)->update($data);

        return redirect('pelanggan/pengaturan');
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
