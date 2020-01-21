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
    public $email = "leo.lazzerini@hotmail.com";
    // public $token = "8E721189DC424DE59AE00FE65F244D5C"; // token sandbox
    public $token = "f64ef267-93bd-4f5f-bc71-c59d17a7e0d1532b3e8d4fe9afbfae6ac153ee2513238673-55ce-47e5-9b79-cd67c2aba8fb";
    public $sandbox = false;

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
                return "Compra Cancelada ou Não Aprovada";
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
    public function statusDestaque($status_pagSeguro){

        switch ($status_pagSeguro) { 
            case 0: return 'Pendente';
                break; 
            case 1 : return 'Aguardando pagamento';
                break; 
            case 2 : return "Em análise" ;
                break; 
            case 3: return "Paga";
                break; 
            case 4: return "Disponível";
                break; 
            case 5: return "Em disputa";
                break;  
            case 6: return "Devolvida";
                break; 
            case 7: return "Compra Cancelada ou Não Aprovada";
                break;    
            default:
                # code...
                return 'Pendente';
                break;
        }
    }
}
