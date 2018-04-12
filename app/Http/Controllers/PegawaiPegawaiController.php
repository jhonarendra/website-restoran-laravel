<?php

namespace App\Http\Controllers;

use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pelanggan;
use App\Http\Controllers\PegawaiController;

class PegawaiPegawaiController extends Controller {

    public function index(){
        if(!PegawaiController::getPegawai()){
            return redirect('pegawai/login');
        }
        $pegawai = PegawaiController::getPegawai();
        $pegawais = Pegawai::all();
        return view('pegawai.pegawai.index', compact('pegawais', 'pegawai'));
    }

    public function create(){
        if(!PegawaiController::getPegawai()){
            return redirect('pegawai/login');
        }
        $pegawai = PegawaiController::getPegawai();
        return view('pegawai.pegawai.create', compact('pegawai'));
    }

    public function store(Request $request){
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
            'password_pegawai' => md5($request->password_pegawai),
            'jabatan_pegawai' => $request->jabatan_pegawai,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Pegawai::insert($data);
        return redirect('pegawai/pegawai');
    }

    public function show($id)
    {
        //
    }

    public function edit($id){
        if(!PegawaiController::getPegawai()){
            return redirect('pegawai/login');
        }
        $pegawai = PegawaiController::getPegawai();
        $pegawais = Pegawai::where('id_pegawai', $id)->get();
        return view('pegawai.pegawai.edit', compact('pegawais', 'pegawai'));
    }

    public function update(Request $request, $id){
        $data = [
            'nama_pegawai' => $request->nama_pegawai,
            'email_pegawai' => $request->email_pegawai,
            'username_pegawai' => $request->username_pegawai,
            'password_pegawai' => md5($request->password_pegawai),
            'jabatan_pegawai' => $request->jabatan_pegawai,
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Pegawai::where('id_pegawai', $id)->update($data);

        return redirect('pegawai/pegawai');
    }

    public function destroy($id){
        Pegawai::where('id_pegawai', '=', $id)->delete();
        return redirect('pegawai/pegawai');
    }
}
