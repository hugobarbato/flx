<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImagemImovel extends Model
{
    
    use SoftDeletes;
    protected $primaryKey = "cd_imagem";
    protected $table = 'tb_imagem';
    
    
    public function imovel()
    {
        return $this->belongsTo('App\Imovel', 'cd_imovel');
    }
    
   
    
}
