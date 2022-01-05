<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Models\Pengguna;
use App\Models\Template;
use App\Models\Color;
use App\Models\Icon;
use App\Models\Keuangan;
use App\Models\Dompet;
use App\Models\Kategori;
use App\Models\Anggaran;

class UserController extends Controller
{
    public function getUserLogin(){
        $user = Auth::user();
        $id_user = $user->id_user;

        $data = Pengguna::findOrFail($id_user);

        return response()->json([
            'status' => true,
            'msg' => 'Berhasil mengambil data',
            'data' => $data
        ]);
    }
    public function setInitialData(){
        $user = Auth::user();
        $id_user = $user->id_user;

        $pengguna = Pengguna::findOrFail($id_user);
        if($pengguna->sudah_init == 0){

            // dompet
            $dompet = Template::with('icon', 'color')->where([
                'is_dompet' => 1,
                'deleted' => 0
            ])->get();

            foreach($dompet as $d){
                Dompet::insert([
                    'id_user' => $id_user,
                    'nama' => $d->nama,
                    'deskripsi' => $d->deskripsi,
                    'icon' => $d->icon->nama,
                    'color' => $d->color->nama
                ]);
            }

            // kategori transfernya
            $dompet_new = Dompet::where([
                'id_user' => $id_user,
                'deleted' => 0
            ])->get();
            
            foreach($dompet_new as $d){
                Kategori::insert([
                    'id_user' => $id_user,
                    'nama' => 'Dari '.$d->nama,
                    'icon' => 'svg-coin',
                    'color' => 'bg-light-purple',
                    'jenis' => 1,
                    'is_transfer' => 1,
                    'id_dompet_asal' => $d->id_dompet,
                    'id_dompet_tujuan' => 0,
                ]);
                
                Kategori::insert([
                    'id_user' => $id_user,
                    'nama' => 'Transfer ke '.$d->nama,
                    'icon' => 'svg-coin',
                    'color' => 'bg-light-purple',
                    'jenis' => 2,
                    'is_transfer' => 1,
                    'id_dompet_asal' => 0,
                    'id_dompet_tujuan' => $d->id_dompet,
                ]);
            }


            // kategori

            $kategori = Template::with('icon', 'color')->where([
                'is_kategori' => 1,
                'deleted' => 0
            ])->get();

            foreach($kategori as $d){
                Kategori::insert([
                    'id_user' => $id_user,
                    'nama' => $d->nama,
                    'icon' => $d->icon->nama,
                    'color' => $d->color->nama,
                    'jenis' => $d->jenis,
                    'is_transfer' => 0,
                    'id_dompet_asal' => 0,
                    'id_dompet_tujuan' => 0,
                ]);
            }

            $pengguna = Pengguna::findOrFail($id_user);
            $pengguna->sudah_init = 1;
            $pengguna->update();

            return response()->json([
                'status' => true,
                'msg' => 'Berhasil menginisialisasi data',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'Pengguna sudah inisialisasi data',
            ]);
        }
    }
}
