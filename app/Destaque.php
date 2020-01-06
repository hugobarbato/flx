<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Destaque extends Model
{ 
    use SoftDeletes;
    protected $primaryKey = "cd_destaque";
    protected $table = 'tb_destaques';
    
    
}
