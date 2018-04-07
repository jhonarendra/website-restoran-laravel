<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pegawai extends Authenticatable
{
    use Notifiable;

    protected $guard = 'pegawai';

    protected $table = 'tb_pegawai';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_pegawai', 'email_pegawai', 'password_pegawai', 'username_pegawai', 'password_pegawai', 'jabatan_pegawai'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password_pegawai', 'remember_token',
    ];
}
