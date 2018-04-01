<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservations';
    protected $fillable = ['id_pelanggan', 'id_admin', 'no_meja_registrasi', 'status_reservasi'];
}
