<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservasi extends Model
{
    use SoftDeletes;

    protected $table = 'tb_reservasi';
    protected $primaryKey = 'id_reservasi';

    public function restoran()
    {
        return $this->belongsTo('App\Models\Restoran', 'id_restoran', 'id_restoran');
    }
    public function pelanggan()
    {
        return $this->belongsTo('App\Models\Pelanggan', 'id_pelanggan', 'id_pelanggan');
    }
    public function pegawai()
    {
        return $this->belongsTo('App\Models\Pegawai', 'id_pegawai', 'id_pegawai');
    }
}
