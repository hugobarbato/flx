<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imovel extends Model
{
    
    use SoftDeletes;
    protected $primaryKey = "cd_imovel";
    protected $table = 'tb_imovel';
    
    
    public function user()
    {
        return $this->belongsTo('App\User', 'cd_user');
    }
    
    public function anunciante()
    {
        return $this->belongsTo('App\TipoAnunciante');
    }
    
    public function anuncio()
    {
        return $this->belongsTo('App\TipoAnuncio');
    }
    
    public function tipo()
    {
        return $this->belongsTo('App\TipoImovel');
    }
    public function imagens() {
        return $this->hasMany('App\ImagemImovel', 'cd_imovel', 'cd_imovel');
    }
}
