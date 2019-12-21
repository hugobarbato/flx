<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    
    public $timestamps = false;
    protected $primaryKey = "cd_site";
    protected $table = 'tb_site';
 
}
