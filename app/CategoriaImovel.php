<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaImovel extends Model
{
    
    public $timestamps = false;
    protected $primaryKey = "cd_categoria_imovel";
    protected $table = 'tb_categoria_imovel';
}
