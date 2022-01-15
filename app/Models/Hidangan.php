<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hidangan extends Model
{
    use SoftDeletes;

    protected $table = 'tb_hidangan';
    protected $primaryKey = 'id_hidangan';
}
