<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAnunciante extends Model
{
    //
    public $timestamps = false;
    protected $primaryKey = "cd_tipo_anunciante";
    protected $table = 'tb_tipo_anunciante';
}
