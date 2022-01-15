<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use SoftDeletes, HasApiTokens, Notifiable;

    protected $table = "tb_user";
    protected $primaryKey = 'id_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'tipe',
        'id_entitas'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function pelanggan()
    {
        return $this->belongsTo('App\Models\Pelanggan', 'id_entitas', 'id_pelanggan');
    }

    public function pegawai()
    {
        return $this->belongsTo('App\Models\Pegawai', 'id_entitas', 'id_pegawai');
    }
}
