<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pelanggan extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_pelanggan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_pelanggan', 'email_pelanggan', 'password_pelanggan', 'username_pelanggan', 'password_pelanggan',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password_pelanggan', 'remember_token',
    ];
}
