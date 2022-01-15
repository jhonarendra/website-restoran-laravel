<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use SoftDeletes;

    protected $table = 'tb_pegawai';
    protected $primaryKey = 'id_pegawai';
    
    protected $fillable = [
        'id_restoran',
        'nama',
        'alamat',
        'no_hp',
        'foto'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_entitas', 'id_pegawai');
    }
    public function restoran()
    {
        return $this->belongsTo('App\Models\Restoran', 'id_restoran', 'id_restoran');
    }
}
