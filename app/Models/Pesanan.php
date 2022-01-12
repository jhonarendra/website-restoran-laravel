<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pesanan extends Model
{
    use SoftDeletes;

    protected $table = 'tb_pesanan';
    protected $primaryKey = 'id_pesanan';

    public function detail()
    {
        return $this->hasMany('App\DetailPesanan', 'id_pesanan', 'id_pesanan');
    }
    public function restoran()
    {
        return $this->belongsTo('App\Restoran', 'id_restoran', 'id_restoran');
    }
    public function pelanggan()
    {
        return $this->belongsTo('App\Pelanggan', 'id_pelanggan', 'id_pelanggan');
    }
    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai', 'id_pegawai', 'id_pegawai');
    }
}
