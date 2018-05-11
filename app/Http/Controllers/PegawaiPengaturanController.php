<?php

namespace App\Http\Controllers;

use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiPengaturanController extends Controller{

    public function index(){
        if(!PegawaiController::getPegawai()){
            return redirect('pegawai/login');
        }
        $pegawai = PegawaiController::getPegawai();
        return view('pegawai.pengaturan.index', compact('pegawai'));
    }

    public function create(){
        
    }

    public function store(Request $request){
        
    }

    public function show($id){
        
    }

    public function edit($id){
        if(!PegawaiController::getPegawai()){
            return redirect('pegawai/login');
        }
        $pegawai = PegawaiController::getPegawai();
        return view('pegawai.pengaturan.edit', compact('pegawai'));
    }

    public function update(Request $request, $id){
        $file = $request->file('foto_pegawai');
        $format = $file->getClientOriginalExtension();
        $name = $request->username_pegawai.'.'.$format;
        $file->move('images/profil', $name);

        $data = [
            'nama_pegawai' => $request->nama_pegawai,
            'email_pegawai' => $request->email_pegawai,
            'username_pegawai' => $request->username_pegawai,
            'password_pegawai' => md5($request->password_pegawai),
            'jabatan_pegawai' => $request->jabatan_pegawai,
            'foto_pegawai' => $name,
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
