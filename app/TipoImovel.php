<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoImovel extends Model
{
    //
    public $timestamps = false;
    protected $primaryKey = "cd_tipo_imovel";
    protected $table = 'tb_tipo_imovel';
    
    
    public function categoria()
    {
        return $this->belongsTo('App\CategoriaImovel');
    }
}
