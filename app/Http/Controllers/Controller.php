<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // id = 7EFD1A41BFBF264CC4281F821D0E8C7A
    public $email = "hugobarbato@gmail.com";
    public $token = "8E721189DC424DE59AE00FE65F244D5C";
    // $token = "ff1ece87-0d9a-4b01-afbf-1a5726045a5635f7483e437f93bc0c7b9143df4c0d863989-92e5-4d36-bda6-17742e99bd66";
    public $sandbox = true;

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


    public function statusPagSeguro($status_pagSeguro){
        switch ($status_pagSeguro) {
            case 'PENDING':
                // O processo de pagamento foi concluído e transação está em análise ou aguardando a confirmação da operadora.
                return 0;
                break;
            case 'ACTIVE':
                // A criação da recorrência, transação validadora ou transação recorrente foi aprovada.
                return 1;
                break;
            case 'PAYMENT_METHOD_CHANGE':
                # Uma transação retornou como "Cartão Expirado, Cancelado ou Bloqueado" e o cartão da recorrência precisa ser substituído pelo comprador.
                return 2;
                break;
            case 'SUSPENDED':
                # A recorrência foi suspensa pelo vendedor.
                return 3;
                break;
            case 'CANCELLED':
                # A criação da recorrência foi cancelada pelo PagSeguro
                return 4;
                break;
            case 'CANCELLED_BY_RECEIVER':
                # A recorrência foi cancelada a pedido do vendedor.
                return 5;
                break;
            case 'CANCELLED_BY_SENDER':
                # A recorrência foi cancelada a pedido do comprador.
                return 6;
                break;
            case 'EXPIRED':
                # A recorrência expirou por atingir a data limite da vigência ou por ter atingido o valor máximo de cobrança definido na cobrança do plano.
                return 7;
                break;
            //
            default:
                # code...
                return 0;
                break;
        }
    }
    public function statusCompra($status_pagSeguro){

        switch ($status_pagSeguro) {
            case 'PENDING' :
            case 0:
                // O processo de pagamento foi concluído e transação está em análise ou aguardando a confirmação da operadora.
                return 'Pendente';
                break;
            case 'ACTIVE':
            case 1 :
                // A criação da recorrência, transação validadora ou transação recorrente foi aprovada.
                return 'Ativo';
                break;
            case 'PAYMENT_METHOD_CHANGE':
            case 2 :
                # Uma transação retornou como "Cartão Expirado, Cancelado ou Bloqueado" e o cartão da recorrência precisa ser substituído pelo comprador.
                return "Cartão Expirado, Cancelado ou Bloqueado" ;
                break;
            case 'SUSPENDED':
            case 3:
                # A recorrência foi suspensa pelo vendedor.
                return "Suspensa";
                break;
                 # A criação da recorrência foi cancelada pelo PagSeguro
            case 'CANCELLED':
            case 4:
             # A recorrência foi cancelada a pedido do vendedor.
            case 'CANCELLED_BY_RECEIVER':
            case 5:
            # A recorrência foi cancelada a pedido do comprador.
            case 'CANCELLED_BY_SENDER':
            case 6: 
                return "Cancelada";
                break;
            case 'EXPIRED':
            case 7:
                # A recorrência expirou por atingir a data limite da vigência ou por ter atingido o valor máximo de cobrança definido na cobrança do plano.
                return "Expirada";
                break;
            default:
                # code...
                return 'Pendente';
                break;
        }
    }
}
