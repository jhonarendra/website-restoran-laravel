<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use SoftDeletes;

    protected $table = 'tb_pegawai';
    protected $primaryKey = 'id_pegawai';

    public function user()
    {
        return $this->belongsTo('App\User', 'id_entitas', 'id_pegawai');
    }
    public function restoran()
    {
        return $this->belongsTo('App\Restoran', 'id_restoran', 'id_restoran');
    }
}
