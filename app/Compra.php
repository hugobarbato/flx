<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compra extends Model
{
    //
    // public $timestamps = false;
    use SoftDeletes;
    protected $primaryKey = "cd_compra";
    protected $table = 'tb_compra';
    
    
}
