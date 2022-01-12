<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailPesanan extends Model
{
    use SoftDeletes;

    protected $table = 'tb_detail_pesanan';
    protected $primaryKey = 'id_detail_pesanan';

    public function hidangan()
    {
        return $this->belongsTo('App\Hidangan', 'id_hidangan', 'id_hidangan');
    }
    public function pesanan()
    {
        return $this->belongsTo('App\Pesanan', 'id_pesanan', 'id_pesanan');
    }
}
