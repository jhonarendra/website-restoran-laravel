<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailPesanan extends Model
{
    use SoftDeletes;

    protected $table = 'tb_detail_pesanan';
    protected $primaryKey = 'id_detail_pesanan';

    public function hidangan()
    {
        return $this->belongsTo('App\Models\Hidangan', 'id_hidangan', 'id_hidangan');
    }
    public function pesanan()
    {
        return $this->belongsTo('App\Models\Pesanan', 'id_pesanan', 'id_pesanan');
    }
}
