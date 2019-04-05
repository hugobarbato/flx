<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAnuncio extends Model
{
    public $timestamps = false;
    protected $primaryKey = "cd_tipo_anuncio";
    protected $table = 'tb_tipo_anuncio';
}
