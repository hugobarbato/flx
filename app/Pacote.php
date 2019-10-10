<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pacote extends Model
{
    //
    // public $timestamps = false;
    protected $primaryKey = "cd_pacote";
    protected $table = 'tb_pacotes';
    use SoftDeletes;
    
    
}
