<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restoran extends Model
{
    use SoftDeletes;

    protected $table = 'tb_restoran';
    protected $primaryKey = 'id_restoran';
}
