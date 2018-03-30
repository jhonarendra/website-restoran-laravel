<!-- BELUM ADA APANYA --><?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    //
    use Notifiable;
    protected $table = 'tb_pegawai';

    protected $fillable =[
        'nama_pegawai',
        'username_pegawai',
        'password_pegawai',
    ];

    protected $hidden =[

    ];

    public function pemilik(){
        
    }
}
