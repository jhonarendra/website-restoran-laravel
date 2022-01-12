<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggan extends Model
{
    use SoftDeletes;

    protected $table = 'tb_pelanggan';
    protected $primaryKey = 'id_pelanggan';

    public function user()
    {
        return $this->belongsTo('App\User', 'id_entitas', 'id_pelanggan');
    }
}
