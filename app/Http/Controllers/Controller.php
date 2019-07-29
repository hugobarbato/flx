<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function returnIsoDate(string $pDate){
        if( strpos ( $pDate ,  "-" ) ){
            $pDate = explode('-',$pDate);
            $dia = $pDate[2];
            $mes = $pDate[1];
            $ano = $pDate[0];
        }else if( strpos ( $pDate ,  "/" ) ){
            $pDate = explode('/',$pDate);
            $dia = $pDate[0];
            $mes = $pDate[1];
            $ano = $pDate[2];            
        }else{
            return null;
        }

        if(checkdate($mes,$dia,$ano)){
            return "$ano-$mes-$dia";
        }
    }
}
